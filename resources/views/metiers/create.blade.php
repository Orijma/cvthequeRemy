@extends('CVTheque')

@section('contenu')

<form method="POST" action="{{ route('metiers.store') }}">
    @csrf
    <div>
        <label for="libelle">Libellé :</label>
        <input type="text" id="libelle" name="libelle" value="{{ old('libelle') }}">
    </div>
    <div>

    <div>
        <label for="slug">Slug:</label>
        <input type="text" id="slug" name="slug" value="{{ old('slug') }}">
    </div>
    <div>

        <label for="description">Description :</label>
        <textarea id="description" name="description">{{ old('description') }}</textarea>
    </div>
    <button type="submit">Créer le métier</button>
</form>

@endsection
