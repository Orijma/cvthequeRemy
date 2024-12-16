<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;


use App\Models\{
    Metier,
};
use App\http\Requests\MetiersRequest;

class MetiersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $metiers=Metier::get();
        $data = [
            'title' =>'Les metiers de la ' . config('app.name'),
            'description'=> "Retourner l'ensemble des metiers de la " . config('app.name') . "pour la formation",
            'metiers' => $metiers
        ];
        return view('metiers.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('metiers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MetiersRequest $metiersRequest)
    {
        $metier = new Metier();
        $metier->libelle = $metiersRequest->libelle;
        $metier->description = $metiersRequest->description;
        $metier->slug = $metiersRequest->slug;
        $metier->save();
        $msg = "Enregistrement Correctement effectué";
        return redirect()->route('metiers.index')->withInformation($msg);
    }

    /**
     * Display the specified resource.
     */
    public function show(Metier $metier)
    {
        $data = [
            'title' =>'le metier de la ' . config('app.name'),
            'description'=> "Retourne un metier " . config('app.name') . "pour la formation",
            'metier' => $metier
        ];
        return view('metiers.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Metier $metier)
    {
        $data = [
            'title' =>'le metier de la ' . config('app.name'),
            'description'=> "Retourne un metier " . config('app.name') . "pour la formation",
            'metier' => $metier
        ];
        return view('metiers.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MetiersRequest $metiersRequest, Metier $metier)
    {
        $valideData = $metiersRequest->all();
        $metier->update($valideData);
        $msg = "Enregistrement Correctement effectué";
        return redirect()->route('metiers.index')->withInformation($msg);
    }


    public function confirm($id)
    {
        $metier= Metier::findOrFail($id);
        return view('metiers.confirm', compact('metier'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Metier $metier)
    {
        $metier->delete();
        $msg = "Suppression Correctement effectué";
        return redirect()->route('metiers.index')->withInformation($msg);
    }
}
