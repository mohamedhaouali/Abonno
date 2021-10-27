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
                <h2>Etat</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('etats.create') }}">  Ajouter Etat </a>
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
                <td>Nom</td>
                <td colspan="2">Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach($etats as $etat)
                <tr>
                    <td>{{$etat->id}}</td>
                    <td>{{$etat->nom}}</td>
                    <td><a href="{{ route('etats.edit', $etat->id)}}" class="btn btn-primary">Modifier</a></td>
                    <td>
                        <form action="{{ route('etats.destroy', $etat->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
            {!! $etats->links() !!}
        <div>
@endsection
