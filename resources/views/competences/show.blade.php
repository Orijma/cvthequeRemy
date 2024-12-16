@extends('CVTheque')


@section('contenu')

<a href="{{route('competence.index')}}"> Retour </a>
</br>
</br>
<p> Numéro : {{$competence->id}} </p>
<p> Intitulé : {{$competence->intitule}} </p>
<p> Description : {{$competence->description}} </p>


@endsection
