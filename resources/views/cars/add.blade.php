@extends('home')
@section('content')
    <main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2"> {{__("Ajouter un Bus")}}</h1>

        </div>
        <form action="{{route('storecar')}}" method="post" enctype="multipart/form-data">
            @csrf
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <p>{{$error}}</p>
                    @endforeach
                </div>
            @endif
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                    <label for="nom">{{__("Nom du bus")}}</label>
                    <input type="text" class="form-control" id="name" name="nom" value="{{old('nom')}}">
                </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                    <label for="marque">{{__("Marque")}}</label>
                    <input type="text" class="form-control" id="marque" name="marque" value="{{old('marque')}}">
                </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                    <label for="address">{{__("Date du circulation")}}</label>

                        <input type="date" class="form-control" id="date_circulation"onkeyup="calculate_age()" name="date_circulation" value="{{old('date_circulation')}}">
                        <p id="calculated_age"></p>
                </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="place_number">{{__("nombre des places")}}</label>
                        <input type="number" class="form-control" id="place_number" name="place_number" value="{{old('place_number')}}">
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="condition">{{__("condition")}}</label>
                        <input type="text" class="form-control" id="condition" name="condition" value="{{old('condition')}}">
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="comment">{{__("Comment")}}</label>
                        <input type="textarea" class="form-control" id="comment" name="comment" value="{{old('comment')}}">
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="comment"> {{__("ligne")}}</label>
                    <select name="ligne_id" id="ligne_id" class="form-control">
                        <option value="" selected disabled>Choisir une ligne</option>
                        @foreach($lignes as $ligne)
                            <option value="{{ $ligne->id }}">
                                {{ $ligne->num }}
                            </option>
                        @endforeach
                    </select>
                </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="comment">{{__("Etat")}}</label>
                    <select name="etat_id" id="line_id" class="form-control">
                        <option value="" selected disabled>Choisir une etat</option>
                        @foreach($etats as $etat)
                            <option value="{{ $etat->id }}">
                                {{ $etat->nom }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            </div>

              <button type="submit" class="btn btn-primary">{{__("Ajouter")}}</button>



        </form>
    </main>
    <script>
        function calculate_age()
        {
            var date_circulation = new Date(document.getElementById("date_circulation").value);




            var date_circulation_day = date_circulation.getDate();
            var date_circulation_month = date_circulation.getMonth();
            var date_circulation_year = date_circulation.getFullYear();

            var today_date = new Date();
            var today_day = today_date.getDate();
            var today_month = today_date.getMonth();
            var today_year = today_date.getFullYear();

            var calculated_age = 0;

            if (today_month > date_circulation_month) calculated_age = today_year - date_circulation_year;
            else if (today_month == date_circulation_month)
            {
                if (today_day >= date_circulation_day) calculated_age = today_year - date_circulation_year;
                else calculated_age = today_year - birth_date_year - 1;
            }
            else calculated_age = today_year - date_circulation_year - 1;

            var output_value = calculated_age;
            document.getElementById("calculated_age").innerHTML = calculated_age;
        }

    </script>
@endsection

