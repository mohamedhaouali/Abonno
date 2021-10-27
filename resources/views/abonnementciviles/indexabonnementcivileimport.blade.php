
@extends('home')

@section('content')


    <main role="main" >
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Gestion des Abonnements civiles </h1>

        </div>

        <div class="row">

            <div class="col-md-6.offset-md-3">

                <form method="POST" action="{{ route('importabonnementcivile') }}"  enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="file"> choose file </label>
                        <input type="file" name="file" class="form-control">
                    </div>
                    <input type="submit"  class="btn btn-primary" value="Envoyer" />
                </form>
            </div>
        </div>



    </main>

@endsection



