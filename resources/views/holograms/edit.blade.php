@extends('home')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Edit Hologram
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
            <form method="post" action="{{ route('holograms.update', $hologram->id ) }}">
                <div class="form-group">
                    @csrf
                    @method('PATCH')
                    <label for="type">Type:</label>
                    <input type="text" class="form-control" name="type" value="{{ $hologram->type }}"/>
                </div>

                <div class="form-group">
                    <label for="price">Prix :</label>
                    <input type="number" class="form-control" name="price" value="{{ $hologram->price }}"/>
                </div>

                <div class="form-group">
                    <label for="cases">stock alert :</label>
                    <input type="number" class="form-control" name="stockalert" value="{{ $hologram->stockalert }}"/>
                </div>

                <button type="submit" class="btn btn-primary">Modifier </button>
            </form>
        </div>
    </div>
@endsection
