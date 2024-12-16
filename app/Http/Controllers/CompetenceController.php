<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{
    Competence,
};
use App\http\Requests\CompetenceRequest;


class CompetenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       // $competences = Competence::orderBy('id','desc')->get();
        // $competences = Competence::orderByDesc('id')->get();
        $competences = Competence::get();
        //dd($competences);
        $data = [
            'title' =>'Les competences de la ' . config('app.name'),
            'description'=> "Retourner l'ensemble des competences de la " . config('app.name') . "pour la formation",
            'competences' => $competences 
        ];
        
        return view('competences.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('competences.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompetenceRequest $competenceRequest)
    {
        /*$valideData = $competenceRequest->all();
        Competence::create($valideData);
        $msg = "Enregistrement Correctement effectué";
        return redirect()->route('competence.index')->withInformation($msg);*/
        $competence = new Competence();
        $competence->intitule = $competenceRequest->intitule;
        $competence->description = $competenceRequest->description;
        $competence->save();
        $msg = "Enregistrement Correctement effectué";
        return redirect()->route('competence.index')->withInformation($msg);
    }

    /**
     * Display the specified resource.
     */
    public function show(Competence $competence)
    {
        $data = [
            'title' =>'la competences de la ' . config('app.name'),
            'description'=> "Retourne un compétence " . config('app.name') . "pour la formation",
            'competence' => $competence 
        ];
        return view('competences.show',$data);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Competence $competence)
    {
        $data = [
            'title' =>'la competences de la ' . config('app.name'),
            'description'=> "Retourne un compétence " . config('app.name') . "pour la formation",
            'competence' => $competence 
        ];

        return view('competences.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompetenceRequest $competenceRequest, Competence $competence)
    {
        $valideData = $competenceRequest->all();
        $competence->update($valideData);
        $msg = "Enregistrement Correctement effectué";
        return redirect()->route('competence.index')->withInformation($msg);

    }

    public function confirm($id)
    {
        $competence = Competence::findOrFail($id);
        return view('competences.confirm', compact('competence'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Competence $competence)
    {
        $competence->delete();
        $msg = "Suppression Correctement effectué";
        return redirect()->route('competence.index')->withInformation($msg);
    }
}
