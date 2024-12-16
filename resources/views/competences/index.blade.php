{{-- Directive de blade spécifiant l'héritage --}}
@extends('CVTheque')

{{-- Directiv de blade spécifiant l'injection de la section qui suit. le lien est réalisé avec la directive @yield() --}}

@section('contenu')
<div>
    <a href="{{route('competence.create')}}"> Crée une compétence </a>
 </div>

 <div>

 <form class="d-flex">
              <input class="form-control me-sm-2" type="search" placeholder="Search">
              <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
            </form>
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
                <th scope="col">Intitulé</th>
                <th scope="col" colspan="3"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($competences as $competence)
            <tr>
                <td>{{$competence->id}}</td>
                <td>{{$competence->intitule}}</td>
                <td>
    {{-- Bouton Consulter --}}
    <form action="{{ route('competence.show', $competence->id) }}" method="GET" class="d-inline">
        @csrf
        <button type="submit" class="btn btn-info btn-sm">
            <i class="fas fa-eye"></i> Consulter
        </button>
    </form>

    {{-- Bouton Modifier --}}
    <form action="{{ route('competence.edit', $competence->id) }}" method="GET" class="d-inline">
        @csrf
        <button type="submit" class="btn btn-warning btn-sm">
            <i class="fas fa-edit"></i> Modifier
        </button>
    </form>

    {{-- Bouton Supprimer --}}
    <form action="{{ route('competence.confirm', $competence->id) }}" method="GET" class="d-inline">
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