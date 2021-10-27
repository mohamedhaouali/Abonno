@extends('home')

@section('content')

    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Ajouter
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
            <form method="post" action="{{ route('holograms.store') }}">
                <div class="form-group">
                    @csrf
                    <label for="type">Type:</label>
                    <input type="text" class="form-control" name="type"/>
                </div>

                <div class="form-group">
                    <label for="price">Prix :</label>
                    <input type="number" class="form-control" name="price"/>
                </div>

                <div class="form-group">
                    <label for="stockalert">Stock alert :</label>
                    <input type="text" class="form-control" name="stockalert"/>
                </div>

                <button type="submit" class="btn btn-primary">Ajouter </button>
            </form>
        </div>
    </div>
@endsection
