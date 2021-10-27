@extends('home')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
           Ajouter type d’abonnement
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
            <form method="post" action="{{ route('subscriptionstypes.store') }}">
                <div class="form-group">
                    @csrf
                    <label for="type">Type:</label>
                    <input type="text" class="form-control" name="type"/>
                </div>

                <div class="form-group">
                    <label for="nom_fr">Nom en francais :</label>
                    <input type="text" class="form-control" name="nom_fr"/>
                </div>

                <div class="form-group">
                    <label for="nom_ar">Nom en arabe :</label>
                    <input type="text" class="form-control" name="nom_ar"/>
                </div>

                <div class="form-group">
                    <label for="description">Description :</label>
                    <textarea rows="5" columns="5" class="form-control" name="description"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Ajouter </button>
            </form>
        </div>
    </div>
@endsection
