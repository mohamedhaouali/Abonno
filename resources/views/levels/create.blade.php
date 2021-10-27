@extends('home')

@section('content')

    <div class="card uper">
        <div class="card-header">
            Ajouter Niveaux
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
            <form method="post" action="{{ route('levels.store') }}">
                <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    @csrf

                    <label for="name">Nom:</label>
                    <input type="text" class="form-control" name="nom"/>
                </div>
                </div>
                </div>
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>
        </div>
    </div>
@endsection
