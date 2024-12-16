@extends('CVTheque')


@section('contenu')
<div class="container mt-5">
    <h2>Confirmation de suppression</h2>
    <p>Êtes-vous sûr de vouloir supprimer le metier suivante ?</p>
    <ul>
        <li><strong>Intitulé :</strong> {{ $metier->libelle }}</li>
        <li><strong>Slug :</strong> {{ $metier->slug }}</li>
        <li><strong>Description :</strong> {{ $metier->description }}</li>
    </ul>
    
    <form method="POST" action="{{ route('metiers.destroy', $metier->id) }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Supprimer</button>
        <a href="{{ route('metiers.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection