@extends('CVTheque')


@section('contenu')
<div class="container mt-5">
    <h2>Confirmation de suppression</h2>
    <p>Êtes-vous sûr de vouloir supprimer la compétence suivante ?</p>
    <ul>
        <li><strong>Intitulé :</strong> {{ $competence->intitule }}</li>
        <li><strong>Description :</strong> {{ $competence->description }}</li>
    </ul>
    
    <form method="POST" action="{{ route('competence.destroy', $competence->id) }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Supprimer</button>
        <a href="{{ route('competence.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection