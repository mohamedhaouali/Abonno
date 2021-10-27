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
                <h2>Client type</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('clientstypes.create') }}">Ajouter clients types</a>
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
                <td>Nom en francais</td>
                <td>Nom en arabe</td>
                <td colspan="2">Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach($clientstypes as $clientstype)
                <tr>
                    <td>{{$clientstype->id}}</td>
                    <td>{{$clientstype->nom_fr}}</td>
                    <td>{{$clientstype->nom_ar}}</td>
                    <td><a href="{{ route('clientstypes.edit', $clientstype->id)}}" class="btn btn-primary">Modifier</a></td>
                    <td>
                        <form action="{{ route('clientstypes.destroy', $clientstype->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
            {!! $clientstypes->links() !!}
        <div>
@endsection
