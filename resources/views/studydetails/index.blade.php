@extends('home')

@section('content')


    <main role="main" >
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Gestion des etudiants</h1>
            <div class="btn-toolbar mb-2 mb-md-0">

                <a href="{{route('addstudydetail')}}" class="btn btn-sm btn-outline-secondary">
                    <span data-feather="calendar"></span>
                    Nouveau
                </a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped ">
                <thead class="thead-dark">
                <tr>

                    <th>ID</th>
                    <th>Nom </th>
                    <th>Niveaux</th>
                    <th>etablishment</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($studydetails as $studydetail)
                    <tr>

                        <td>{{$studydetail->id}}</td>
                        <td>{{$studydetail->name}}</td>


                        <td>
                            {{ $studydetail->level->name}}
                        </td>

                        <td>
                            {{ $studydetail->etablishment->name_fr}}
                        </td>




                     <td>
                            <a href="{{route('editstudydetail',['id'=>$studydetail->id])}}" class="btn btn-sm
                                btn-primary">Voir /
                                Modifier</a>



                            <a onclick="return(confirm('sans regret ?'))"
                               href="{{route('deletestudydetail',['id'=>$studydetail->id])}}"
                               class="btn btn-sm btn-outline-danger">Supprimer</a>
</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $studydetails->links() !!}
        </div>
    </main>

@endsection
