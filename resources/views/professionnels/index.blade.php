{{-- Directive de blade spécifiant l'héritage --}}
@extends('CVTheque')

{{-- Début de la section de contenu --}}
@section('contenu')



<form action="{{ route('professionnels.index') }}" method="GET">
    <input type="text" name="competence" placeholder="Rechercher par compétence" value="{{ request('competence') }}">
    <button type="submit">Rechercher</button>
</form>

{{-- Sélecteur pour filtrer les professionnels par métier --}}
<div class="form-group">
    <select onChange="location.href=this.value" class="form-control border-primary">
        <option value="{{ route('professionnels.index') }}" @unless($slug) selected @endunless>
            Tous les professionnels
        </option>
        @foreach($metiers as $metier)
            <option value="{{ route('professionnels.metier', ['slug' => $metier->slug]) }}"
                {{ $slug == $metier->slug ? 'selected' : '' }}>
                {{ $metier->libelle }}
            </option>
        @endforeach
    </select>
</div>

{{-- Lien pour ajouter un nouveau professionnel --}}
<div class="my-3">
    <a href="{{ route('professionnels.create') }}" class="btn btn-primary">Ajouter un professionnel</a>
</div>

{{-- Affichage des messages d'information --}}
@if(session('information'))
    <div class="alert alert-dismissible alert-success">
        <h4 class="alert-heading">Information :</h4>
        <p class="mb-0">{{ session('information') }}</p>
    </div>
@endif

{{-- Tableau affichant la liste des professionnels --}}
<div class="bs-component">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Numéro</th>
                <th scope="col">Nom et Prénom</th>
                <th scope="col">Intitulé du métier</th> 
                <th scope="col">Domiciliation</th>
                <th scope="col">Formation</th>
                <th scope="col" colspan="3">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($professionnels as $professionnel)
                <tr>
                    <td>{{ $professionnel->id }}</td>
                    <td>{{ $professionnel->nom }} {{ $professionnel->prenom }}</td>
                   <td> {{ $professionnel->metier->libelle }}</td> 
                    <td>{{ $professionnel->cp }} {{ $professionnel->ville }}</td>
                    <td>{{ $professionnel->formation == 0 ? 'NON' : 'OUI' }}</td>
                    <td>
                        {{-- Bouton Consulter --}}
                        <form action="{{ route('professionnels.show', $professionnel->id) }}" method="GET" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-info btn-sm">Consulter</button>
                        </form>
                        {{-- Bouton Modifier --}}
                        <form action="{{ route('professionnels.edit', $professionnel->id) }}" method="GET" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-warning btn-sm">Modifier</button>
                        </form>
                        {{-- Bouton Supprimer --}}
                        <form action="{{ route('professionnels.destroy', $professionnel->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">Aucun professionnel ne correspond à votre demande</td>
                </tr>
            @endforelse
        </tbody>
    </table>
        <footer class="pagination justify-content-center p-lg-5">
                {{ $professionnels->links() }}

        </footer>

</div>

@endsection
