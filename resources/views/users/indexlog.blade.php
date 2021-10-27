
@extends('home')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Liste des utilisateurs</div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Mail</th>
                                <th scope="col" >Roles</th>
                                <th scope="col">Agences</th>
                                <th scope="col">Last Seen</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>

                                    <td>{{ implode(', ' , $user->roles()->get()->pluck('name')->toArray()) }}</td>


                                    <td>
                                        {{  $user->agence->nom_fr}}
                                    </td>
                                    <td>{{ $user->created_at }}</td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $users->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
