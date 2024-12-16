@extends('CVTheque')


@section('contenu')
<a href="{{route('competence.index')}}"> Retour </a>

<form method="POST" action="{{ route('competence.update', ['competence' => $competence->id]) }}">
    @method('PUT')
    @csrf
    <fieldset>
        <legend></legend>
        
        <!-- Intitulé -->
        <div class="form-group row">
            <label for="intitule" class="col-sm-2 col-form-label">Intitulé :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="intitule" name="intitule" 
                       value="{{ old('intitule', $competence->intitule) }}">
            </div>
        </div>

        <!-- Description -->
        <div class="form-group">
            <label for="description" class="col-sm-2 col-form-label">Description :</label>
            <textarea class="form-control" id="description" name="description" rows="3">
                {{ old('description', $competence->description) }}
            </textarea>
        </div>
    </fieldset>
    <button type = "submit"> Modifier </button>
</form>

@endsection
