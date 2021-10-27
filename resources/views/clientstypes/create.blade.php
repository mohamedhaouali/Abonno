@extends('home')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Ajouter client type
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
            <form method="post" action="{{ route('clientstypes.store') }}">
                <div class="form-group">
                    @csrf
                    <label for="name_fr">Nom en francais:</label>
                    <input type="text" class="form-control" name="nom_fr"/>
                </div>

                <div class="form-group">
                    <label for="nom_ar">Nom en arabe :</label>
                    <input type="text" class="form-control" name="nom_ar"/>
                </div>
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>
        </div>
    </div>
@endsection
