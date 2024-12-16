@extends('CVTheque')

@section('contenu')

<div class="container mt-4">
    <h2>Ajouter un professionnel</h2>
    <form method="POST" action="{{ route('professionnels.store') }}">
    @csrf



    <select name="metier_id" @error('metier_id') is-invalid @enderror>
        <option value=""@if(old('metier_id')=="") selected @endif>Choisir un métier</option>
        @foreach($metiers as $metier)
            <option value="{{$metier->id}}" @if(old('metier_id') == $metier->id) selected @endif>{{$metier->libelle}}</option>
        @endforeach
    </select>

        {{-- Prénom --}}
        <div class="form-group mb-3">
            <label for="prenom">Prénom</label>
            <input type="text" id="prenom" name="prenom" class="form-control" value="{{ old('prenom') }}">
        </div>

        {{-- Nom --}}
        <div class="form-group mb-3">
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" class="form-control" value="{{ old('nom') }}">
        </div>

        {{-- Code postal --}}
        <div class="form-group mb-3">
            <label for="cp">Code postal</label>
            <input type="text" id="cp" name="cp" class="form-control" value="{{ old('cp') }}">
        </div>

        {{-- Ville --}}
        <div class="form-group mb-3">
            <label for="ville">Ville</label>
            <input type="text" id="ville" name="ville" class="form-control" value="{{ old('ville') }}">
        </div>

        {{-- Date de naissance --}}
        <div class="form-group mb-3">
            <label for="naissance">Date de naissance</label>
            <input type="date" id="naissance" name="naissance" class="form-control" value="{{ old('naissance') }}">
        </div>

        {{-- Email 
        <div class="form-group mb-3">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}">
            </div> --}}


            {{-- Téléphone --}}
<div class="form-group mb-3">
    <label for="telephone">Téléphone</label>
    <input type="text" id="telephone" name="telephone" 
           class="form-control @error('telephone') is-invalid @enderror" 
           value="{{ old('telephone') }}">
    @error('telephone')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>


        {{-- Formation (bouton radio) --}}
        <div class="form-group mb-3">
            <label>Formation</label>
            <div>
                <div class="form-check form-check-inline">
                    <input type="radio" id="formation_oui" name="formation" value="1" class="form-check-input" {{ old('formation') == '1' ? 'checked' : '' }}>
                    <label class="form-check-label" for="formation_oui">Oui</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" id="formation_non" name="formation" value="0" class="form-check-input" {{ old('formation') == '0' ? 'checked' : '' }}>
                    <label class="form-check-label" for="formation_non">Non</label>
                </div>
            </div>
        </div>

        {{-- Domaine (checkbox) - S, R, D --}}
        <div class="form-check">
    <input type="checkbox" class="form-check-input" id="domaine1" name="domaine[]" value="S"
        {{ (is_array(old('domaine')) && in_array('S', old('domaine'))) ? 'checked' : '' }}>
    <label class="form-check-label @error('domaine') text-danger @enderror" for="domaine1">
        Systèmes
    </label>
</div>

<div class="form-check">
    <input type="checkbox" class="form-check-input" id="domaine2" name="domaine[]" value="R"
        {{ (is_array(old('domaine')) && in_array('R', old('domaine'))) ? 'checked' : '' }}>
    <label class="form-check-label @error('domaine') text-danger @enderror" for="domaine2">
        Réseaux
    </label>
</div>




<div class="form-check">
    <input type="checkbox" class="form-check-input" id="domaine3" name="domaine[]" value="D"
        {{ (is_array(old('domaine')) && in_array('D', old('domaine'))) ? 'checked' : '' }}>
    <label class="form-check-label @error('domaine') text-danger @enderror" for="domaine3">
        Développement
    </label>
</div>



{{-- Sélection des compétences (checkbox) --}}
<div class="form-group mb-3">
    <label for="competences">Compétences</label>
    <div>
        @foreach($competences as $competence)
            <div class="form-check">
                <input type="checkbox" 
                       class="form-check-input" 
                       id="competence_{{ $competence->id }}" 
                       name="competences[]" 
                       value="{{ $competence->id }}" 
                       {{ is_array(old('competences')) && in_array($competence->id, old('competences')) ? 'checked' : '' }}>
                <label class="form-check-label" for="competence_{{ $competence->id }}">
                    {{ $competence->intitule }}
                </label>
            </div>
        @endforeach
    </div>
    @error('competences')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>


        {{-- Source --}}
        <div class="form-group mb-3">
            <label for="source">Source</label>
            <input type="text" id="source" name="source" class="form-control" value="{{ old('source') }}">
        </div>

        {{-- Observation --}}
        <div class="form-group mb-3">
            <label for="observation">Observation</label>
            <textarea id="observation" name="observation" rows="4" class="form-control">{{ old('observation') }}</textarea>
        </div>

        {{-- Bouton soumettre --}}
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
    </form>
</div>

@endsection
