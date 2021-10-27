@extends('home')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Liste des utilisateurs</div>

                    <form class="form-group" method="POST" action="{{route('usersearch')}}">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <input type="text" name="query" class="form-control">
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-success">{{ __('search') }}</button>
                            </div>
                        </div>
                    </form>


                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Mail</th>
                                <th scope="col" >Roles</th>
                                <th scope="col">Agences</th>
                                <th scope="col">Actions</th>
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
                                        {{  $user->agence->name_fr}}
                                    </td>

                                    <td>
                                        @can('edit-users')
                                            <a href="{{route('admin.users.edit', $user->id)}}"> <button class="btn btn-primary">Editer</button></a>
                                        @endcan
                                        @can('delete-users')
                                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-danger" >Supprimer</button>

                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
