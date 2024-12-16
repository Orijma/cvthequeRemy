{{-- Directive de blade spécifiant l'héritage --}}
@extends('CVTheque')

{{-- Directiv de blade spécifiant l'injection de la section qui suit. le lien est réalisé avec la directive @yield() --}}

@section('contenu')
<div>
    <a href="{{route('metiers.create')}}"> Ajouter un métier </a>
 </div>

@if(session('information'))
<div class="bs-docs-section pos-bloc-section">    
    <div class="alert alert-dismissible alert-success">        
        <h4 class="alert-heading">Information : </h4>        
        <p class="mb-0">{{session('information')}}</p>    
    </div></div>@endif

<div class="bs-component">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Numéro</th>
                <th scope="col">Nom Du Metier</th>
                <th scope="col" colspan="3"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($metiers as $metier)
            <tr>
                <td>{{$metier->id}}</td>
                <td>{{$metier->libelle}}</td>
                <td>
    {{-- Bouton Consulter --}}
    <form action="{{ route('metiers.show', $metier->id) }}" method="GET" class="d-inline">
        @csrf
        <button type="submit" class="btn btn-info btn-sm">
            <i class="fas fa-eye"></i> Consulter
        </button>
    </form>

    {{-- Bouton Modifier --}}
    <form action="{{ route('metiers.edit', $metier->id) }}" method="GET" class="d-inline">
        @csrf
        <button type="submit" class="btn btn-warning btn-sm">
            <i class="fas fa-edit"></i> Modifier
        </button>
    </form>

    {{-- Bouton Supprimer --}}
    <form action="{{ route('metiers.confirm', $metier->id) }}" method="GET" class="d-inline">
        @csrf
        <button type="submit" class="btn btn-danger btn-sm">
            <i class="fas fa-trash"></i> Supprimer
        </button>
    </form>
</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection