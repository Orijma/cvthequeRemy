<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Competence,
    Professionnel,
    Metier,
};


use App\Http\Requests\ProfessionnelRequest;

class ProfessionnelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $professionnelrequest, $slug=null)
    {
        //$slug = "designer-graphique";


        $query = $professionnelrequest->input('competence');

        if ($query) {
            $professionnels = Professionnel::whereHas('competences', function ($q) use ($query) {
                $q->where('intitule', 'LIKE', "%$query%");
            })->get();
        } else {
            $professionnels = Professionnel::all();
        }
        
        $professionnels = $slug ? 
        Metier::where('slug',$slug)->firstOrFail()->professionnels()->paginate(5) : 
        Professionnel::paginate(5);
        $metiers = Metier::all();
        $data = [
            'title'=>'professionnels de la ' .config('app.name'),
            'description'=>'Retrouvez les professionels de la ' .config('app.name'),
            'professionnels'=>$professionnels,
            'metiers'=>$metiers,
            'slug'=>$slug
        ];
        return view('professionnels.index',data: $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Chargement du combo métier
        $metiers = Metier::orderBy('libelle')->get();

        //pour relation 1,n 1,n Professionnnel/Compétence
        $competences = Competence::orderBy('intitule')->get();
        $data = [
            'title'=>'professionnels de la ' .config('app.name'),
            'description'=>'Retrouvez les professionels de la ' .config('app.name'),
            'metiers'=>$metiers,
            'competences'=>$competences
        ];
        return view('professionnels.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProfessionnelRequest $professionelRequest)
    {
        $validData = $professionelRequest->all();
    
        // Gestion des domaines sous forme de chaîne
        $validData['domaine'] = implode(',', $professionelRequest->input('domaine'));
    
        // Vérifier et gérer l'upload du fichier PDF (CV)
        if ($professionelRequest->hasFile('cv')) {
            $cvFile = $professionelRequest->file('cv');
    
            // Validation des fichiers (PDF uniquement, max 2MB)
            if ($cvFile->isValid() && $cvFile->extension() === 'pdf') {
                $cvPath = $cvFile->store('cvs', 'public'); // Stocker dans storage/app/public/cvs
                $validData['cv'] = $cvPath; // Ajouter le chemin au tableau validé
            }
        }
    
        // Créer un nouveau professionnel
        $nouveauProfessionnel = Professionnel::create($validData);
    
        // Associer les compétences
        $nouveauProfessionnel->competences()->attach($professionelRequest->input('competences'));
    
        $msg = "Enregistrement correctement effectué";
        return redirect()->route('professionnels.index')->withInformation($msg);
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Professionnel $professionnel)
    {
        $data = [
            'professionnel' => $professionnel
        ];
        return view('professionnels.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //$professionnel->competences->sync($professionelRequest->competences'))
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }



    public function search(Request $professionelRequest)
{

    $query = $professionelRequest->input('query');
    //dd($query);

    if (strlen($query) < 3) {
        return redirect()->route('professionnels.index')
            ->with('error', 'Veuillez entrer au moins 3 caractères pour la recherche.');
    }

    $professionnels = Professionnel::where('nom', 'LIKE', "%$query%")
        ->orWhere('prenom', 'LIKE', "%$query%")
        ->get();
        $data = [
            'professionnels' => $professionnels,
            'query' => $query
        ];
    return view('professionnels.search',$data);
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Professionnel $professionnel)
    {
        $professionnel->delete();
        $msg = "Suppression Correctement effectué";
        return redirect()->route('professionnels.index')->withInformation($msg);
    }
    
}
