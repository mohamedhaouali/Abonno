@extends('home')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">


            <div class="col-xs-6 col-sm-6 col-md-6">


            </div>
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

            <form method="post" action="{{ route('companies.store') }}">
                <div class="form-group">
                    @csrf
                    <label for="nom_fr">Nom en francais:</label>
                    <input type="text" class="form-control" name="nom_fr"/>
                </div>

                <div class="form-group">
                    <label for="nom_ar">Nom en arabe:</label>
                    <input type="text" class="form-control" name="nom_ar"/>
                </div>

                <div class="form-group">
                    <label for="adresse">Adresse:</label>
                    <input type="text" class="form-control" name="adresse"/>
                </div>


                <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>
        </div>
    </div>
@endsection
