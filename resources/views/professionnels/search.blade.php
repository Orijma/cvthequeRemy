@extends('CVTheque')

@section('contenu')
<div class="container">
    <h1>Résultats de recherche</h1>

    @if($professionnels->isEmpty())
        <p>Aucun professionnel ne correspond à votre recherche : "{{ $query }}".</p>
    @else
        <p>Résultats pour : "{{ $query }}"</p>
        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Ville</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($professionnels as $professionnel)
                    <tr>
                        <td>{{ $professionnel->nom }}</td>
                        <td>{{ $professionnel->prenom }}</td>
                        <td>{{ $professionnel->email }}</td>
                        <td>{{ $professionnel->ville }}</td>
                        <td>
                            <a href="{{ route('professionnels.show', $professionnel->id) }}" class="btn btn-info btn-sm">Consulter</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
