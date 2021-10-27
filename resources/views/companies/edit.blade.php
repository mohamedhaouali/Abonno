@extends('home')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Modifier Companie
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="post" action="{{ route('companies.update', $companie->id ) }}">
                <div class="form-group">
                    @csrf
                    @method('PATCH')
                    <label for="nom_fr">Nom en francais:</label>
                    <input type="text" class="form-control" name="nom_fr" value="{{ $companie->nom_fr }}"/>
                </div>
                <div class="form-group">
                    <label for="cases">Nom en arabe :</label>
                    <input type="text" class="form-control" name="nom_ar" value="{{ $companie->nom_ar }}"/>
                </div>
                <div class="form-group">
                    <label for="adresse">Adresse :</label>
                    <input type="text" class="form-control" name="adresse" value="{{ $companie->adresse }}"/>
                </div>
                <button type="submit" class="btn btn-primary">Modifier </button>
            </form>
        </div>
    </div>
@endsection
