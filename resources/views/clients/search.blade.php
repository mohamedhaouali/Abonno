@extends('home')

@section('content')


    <main role="main" >
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Gestion des clients</h1>
            <div class="col-md-4">

                <form class="form-group" method="POST" action="{{route('clientsearch')}}">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <input type="text" name="query" class="form-control">
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-success">{{ __('recherche par nom') }}</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>

        <div class="table-responsive">
            <table class="table table-striped ">
                <thead class="thead-dark">
                <tr>

                    <th scope="col">ID</th>
                    <th scope="col"> {{__("Nom abonne")}}</th>
                    <th scope="col">{{__("Prenom abonne")}}</th>
                    <th scope="col">CIN</th>
                    <th scope="col">{{__("Nom du parent")}}</th>
                    <th scope="col">{{__("Prenom du parent")}}</th>
                    <th scope="col">{{__("Profile image")}}</th>
                    <th scope="col">{{__("type des clients")}} </th>
                    <th scope="col">{{__("ligne")}} </th>

                    <th scope="col">{{__("Prix")}}</th>
                    <th scope="col">{{__("Classe")}}</th>

                    <th scope="col">{{__("Actions")}}</th>

                </tr>
                </thead>
                <tbody>
                @foreach($clients as $client)
                    <tr>

                        <td>{{$client->id}}</td>
                        <td>{{$client->nomabonne}}</td>
                        <td>{{$client->prenomabonne}}</td>
                        <td>{{$client->cin}}</td>
                        <td>{{$client->nomparent}}</td>
                        <td>{{$client->prenomparent}}</td>
                        <td> <img src="{{asset('images')}}/{{$client->profileimage}}" style="max-height:60px;" /> </td>
                        <td>
                            {{$client->clientstype->nom_ar}}

                        </td>



                        <td>
                            {{$client->ligne->nom_ar}}

                        </td>



                        <td>{{$client->prixtotale}}</td>

                        <td>
                            {{$client->classe->nom}}

                        </td>


                        <td>
                            <a href="{{route('editclient',['id'=>$client->id])}}" class="btn btn-sm
                                btn-primary">Voir /
                                Modifier</a>



                            <a onclick="return(confirm('sans regret ?'))"
                               href="{{route('deleteclient',['id'=>$client->id])}}"
                               class="btn btn-sm btn-outline-danger">Supprimer</a>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </main>

@endsection
