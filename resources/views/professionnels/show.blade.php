@extends('CVTheque')

@section('contenu')

<a href="{{route('professionnels.index')}}" class="btn btn-secondary mb-4"> Retour </a>

<div class="card p-4">
    <h2 class="mb-4">Détails du professionnel</h2>
    
    <p><strong>Numéro :</strong> {{$professionnel->id}}</p>
    <p><strong>Nom et Prénom :</strong> {{$professionnel->nom}} {{ $professionnel->prenom }}</p>
    <p><strong>Métier :</strong> {{ $professionnel->metier->libelle }}</p>
    <p><strong>Lieu d'habitation :</strong> {{ $professionnel->cp }} {{ $professionnel->ville }}</p>
    <p><strong>Email :</strong> {{$professionnel->email}}</p>
    <p><strong>Rencontre :</strong> {{$professionnel->source}}</p>
    <p><strong>Formation :</strong> {{ $professionnel->formation == 0 ? 'NON' : 'OUI' }}</p>

    <p><strong>Compétences :</strong></p>
    <ul class="list-group mb-3">
        @forelse ($professionnel->competences as $competence)
            <li class="list-group-item">{{ $competence->intitule }}</li>
        @empty
            <li class="list-group-item text-muted">Aucune compétence enregistrée</li>
        @endforelse
    </ul>

    @if($professionnel->observation != NULL)
        <p><strong>Observation :</strong> {{$professionnel->observation}}</p>
    @endif


    @if ($professionnel->cv)
    <a href="{{ asset('storage/' . $professionnel->cv) }}" target="_blank">Télécharger le CV</a>
@else
    <p>Aucun CV disponible</p>
@endif
</div>

@endsection