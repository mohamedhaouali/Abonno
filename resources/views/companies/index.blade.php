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
                <h2></h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('companies.create') }}">  Ajouter companie</a>
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
                <td>Adresse</td>
                <td colspan="2">Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach($companies as $companie)
                <tr>
                    <td>{{$companie->id}}</td>
                    <td>{{$companie->nom_fr}}</td>
                    <td>{{$companie->nom_ar}}</td>
                    <td>{{$companie->adresse}}</td>
                    <td><a href="{{ route('companies.edit', $companie->id)}}" class="btn btn-primary">Modifier</a></td>
                    <td>
                        <form action="{{ route('companies.destroy', $companie->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
            {!! $companies->links() !!}
        <div>
@endsection
