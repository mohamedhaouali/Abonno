@extends('home')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

    <form  method="POST" action="{{route('sumbitData')}}">
        @csrf
    <div class="form-group row">


    <table class="tblGrid">
        <thead>
        <tr>

            <th> {{__("Nom du parent")}}</th>
            <th>{{__("Prenom du parent")}}</th>
            <th>{{__("Nom abonne")}}</th>
            <th>{{__("Prenom abonne")}}</th>
            <th>{{__("CIN")}}</th>
            <th>nombre enfants</th>
            <th>Nom enfant 1</th>
            <th>ligne</th>
            <th>classe</th>

<th><a href="javascript:;" class="btn btn-info addRow">+</a> </th>
        </tr>
        </thead>
        <tbody>
        <tr>

            <td>
  <input type="text" class="form-control" id="nom" name="nom[]" value="{{old('nom')}}">
            </td>
            <td>
  <input type="text" class="form-control" id="prenom" name="prenom[]" value="{{old('prenom')}}">
            </td>
            <td>
                <input type="number" class="form-control" id="cin" name="cin[]" value="{{old('cin')}}">
            </td>


            <td>
                <input type="text" class="form-control" id="nomenfants1" name="nomenfant1[]" value="{{old('nomenfant1')}}">
            </td>



          <td>  <a href="javascript:;" class="btn btn-danger deleteRow">-</a></td>

        </tr>

        </tbody>
    </table>
</div>
        <input type="submit" class="btn btn-primary" value="Envoyer">
    </form>
    </div>
<script>

    $('thead').on('click','.addRow', function () {

     var tr = '<tr>'+

            '<td>'+

            '<input type="text" class="form-control" id="nomenfant2" name="nomenfant2[]" value="{{old('nomenfant2')}}">'+
            '</td>'+

         '<td>'+
         '<input type="text" class="form-control" id="nomenfant3" name="nomenfant3[]" value="{{old('nomenfant3')}}">'+
         '</td>'+

         '<td>'+
         '<input type="text" class="form-control" id="nomenfant4" name="nomenfant4[]" value="{{old('nomenfant4')}}">'+
         '</td>'+

         '<td>'+
         '<input type="text" class="form-control" id="nomenfant5" name="nomenfant5[]" value="{{old('nomenfant5')}}">'+
         '</td>'+

         '<td>'+
         '<input type="text" class="form-control" id="nomenfant6" name="nomenfant6[]" value="{{old('nomenfant6')}}">'+
         '</td>'+

         '<td>'+
         '<input type="text" class="form-control" id="nomenfant6" name="nomenfant7[]" value="{{old('nomenfant7')}}">'+
         '</td>'+


            '<td>  <a href="javascript:;" class="btn btn-danger deleteRow">-</a></td>'+

        '</tr>';


$('tbody').append(tr);
    })
$('tbody').on('click','.deleteRow',function(){
    $(this).parent().parent().remove();
})

</script>





<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</body>
</html>

@endsection
