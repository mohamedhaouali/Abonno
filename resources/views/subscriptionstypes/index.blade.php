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
                <h2>abonnement types</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('subscriptionstypes.create') }}"> Ajouter</a>
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
                <td>Nom en francais </td>
                <td>Nom en arabe</td>
                <td>Description</td>
                <td colspan="2">Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach($subscriptiontypes as $subscriptiontype)
                <tr>
                    <td>{{$subscriptiontype->id}}</td>
                    <td>{{$subscriptiontype->type}}</td>
                    <td>{{$subscriptiontype->nom_fr}}</td>
                    <td>{{$subscriptiontype->nom_ar}}</td>
                    <td>{{$subscriptiontype->description}}</td>
                    <td><a href="{{ route('subscriptionstypes.edit', $subscriptiontype->id)}}" class="btn btn-primary">Modifier</a></td>
                    <td>
                        <form action="{{ route('subscriptionstypes.destroy', $subscriptiontype->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
            {!! $subscriptiontypes->links() !!}
        <div>
@endsection
