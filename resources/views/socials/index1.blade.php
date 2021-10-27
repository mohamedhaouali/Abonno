@extends('home')

@section('content')


    <main role="main" >
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Gestion des Sociales</h1>




            <form class="form-group" method="POST" action="{{route('socialsearch')}}">
                @csrf
                <div class="row">
                    <div class="col">
                        <input type="text" name="query" class="form-control">
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-success">{{ __('recherche par cin') }}</button>
                    </div>
                </div>
            </form>

        </div>
        <div class="table-responsive">
            <table class="table table-striped ">
                <thead class="thead-dark">
                <tr>

                    <th>ID</th>
                    <th>{{__("Nom du parent")}}</th>
                    <th>{{__("Prenom du parent")}}</th>
                    <th>{{__("Nom abonne")}}</th>
                    <th>{{__("Prenom abonne")}}</th>
                    <th>{{__("Cin")}}</th>


                    <th>{{__("nombre enfants")}}</th>

                    <th>{{__("Nom enfant 1")}}</th>
                    <th>{{__("Nom enfant 2")}}</th>
                    <th>{{__("Nom enfant 3")}}</th>
                    <th>{{__("Nom enfant 4")}}</th>
                    <th>{{__("Nom enfant 5")}}</th>
                    <th>{{__("Nom enfant 6")}}</th>
                    <th>{{__("Nom enfant 7")}}</th>
                    <th>{{__("ligne")}}</th>
                    <th>{{__("classe")}}</th>
                   <th>{{__("Actions")}}</th>

                </tr>
                </thead>
                <tbody>
                @foreach($socials as $social)
                    <tr>

                        <td>{{$social->id}}</td>
                        <td>{{$social->nomparent}}</td>
                        <td>{{$social->prenomparent}}</td>
                        <td>{{$social->nomabonne}}</td>
                        <td>{{$social->prenomabonne}}</td>
                        <td>{{$social->cin}}</td>
                        <td>{{$social->nombrenfants}}</td>


                        <td>{{$social->nomenfant1}}</td>

                        <td>{{$social->nomenfant2}}</td>
                        <td>{{$social->nomenfant3}}</td>
                        <td>{{$social->nomenfant4}}</td>
                        <td>{{$social->nomenfant5}}</td>
                        <td>{{$social->nomenfant6}}</td>
                        <td>{{$social->nomenfant7}}</td>


                        <td>
                            {{$social->ligne->nom_ar}}

                        </td>

                        <td>
                            {{$social->classe->nom}}

                        </td>


                            <td>
                                <a href="{{route('editsocial',['id'=>$social->id])}}" class="btn btn-sm
                                btn-primary">
                                    {{__("Modifier")}}</a>


                                    <a onclick="return(confirm('sans regret ?'))"
                                       href="{{route('deletesocial',['id'=>$social->id])}}"
                                       class="btn btn-sm btn-outline-danger">{{__("Supprimer")}}</a>
                            </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $socials->links() !!}
        </div>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#show_menu").click(function () {
                $( ".list_container" ).show(3000);
            });
            $("#hide_menu").click(function () {
                $( ".list_container" ).hide(3000);
            });
        });
    </script>
@endsection

