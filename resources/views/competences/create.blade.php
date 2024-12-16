@extends('CVTheque')

@section('contenu')

<div class="bs docs section pos bloc section">
    <div class="col-lg-12">
        <div class="page-header">
            <h4 id="tables">Fiche compétence : Consultation</h4>
        </div>
    </div>
    <div class="bs-component">
        <form method="POST" action="{{ route('competence.store') }}">
            @method('POST')
            @csrf
            <fieldset>
                <legend></legend>
                
                <!-- Intitulé -->
                <div class="form-group row">
                    <label for="intitule" class="col-sm-2 col-form-label">Intitulé :</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('intitule') is-invalid @enderror" id="intitule" name="intitule" 
                               value="{{ old('intitule') }}">
                               @error('intitule')
                                    <p class="text-danger" role="alert"> {{ $message }}</p>
                               @enderror
                    </div>
                </div>

                <!-- Description -->
                <div class="form-group">
                    <label for="description" class="col-sm-2 col-form-label">Description :</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                        @error('description')
                             <p class="text-danger" role="alert"> {{ $message }}</p>
                       @enderror
                </div>
            </fieldset>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
</div>

@endsection