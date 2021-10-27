@extends('home')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>holograms</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('holograms.create') }}"> Ajouter</a>
            </div>
        </div>
    </div>

    <div class="uper">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif
        <table class="table table-striped">
            <thead>
            <tr>
                <td>ID</td>
                <td>Type</td>
                <td>Prix</td>
                <td>Stock alert</td>
                <td colspan="2">Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach($holograms as $hologram)
                <tr>
                    <td>{{$hologram->id}}</td>
                    <td>{{$hologram->type}}</td>
                    <td>{{$hologram->price}}</td>
                    <td>{{$hologram->stockalert}}</td>
                    <td><a href="{{ route('holograms.edit', $hologram->id)}}" class="btn btn-primary">Modifier</a></td>
                    <td>
                        <form action="{{ route('holograms.destroy', $hologram->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
            {!! $holograms->links() !!}
        <div>
@endsection
