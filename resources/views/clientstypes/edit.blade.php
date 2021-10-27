@extends('home')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Modifier Client type
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
            <form method="post" action="{{ route('clientstypes.update', $clientstype->id ) }}">
                <div class="form-group">
                    @csrf
                    @method('PATCH')
                    <label for="npm_fr">Nom en francais:</label>
                    <input type="text" class="form-control" name="nom_fr" value="{{ $clientstype->nom_fr }}"/>
                </div>

                <div class="form-group">
                    <label for="cases">Nom en arabe :</label>
                    <input type="text" class="form-control" name="nom_ar" value="{{ $clientstype->nom_ar }}"/>
                </div>
                <button type="submit" class="btn btn-primary">Modifier</button>
            </form>
        </div>
    </div>
@endsection
