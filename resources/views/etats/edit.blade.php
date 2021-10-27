@extends('home')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Modifier Etat
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
            <form method="post" action="{{ route('etats.update', $etat->id ) }}">
                <div class="form-group">
                    @csrf
                    @method('PATCH')
                    <label for="nom">Nom:</label>
                    <input type="text" class="form-control" name="nom" value="{{ $etat->nom }}"/>
                </div>


                <button type="submit" class="btn btn-primary">Modifier</button>
            </form>
        </div>
    </div>
@endsection
