@extends('CVTheque')


@section('contenu')

<a href="{{route('metiers.index')}}"> Retour </a>
</br>
</br>
<p> Numéro : {{$metier->id}} </p>
<p> Intitulé : {{$metier->libelle}} </p>
<p> Description : {{$metier->description}} </p>


@endsection
