@extends('home')
@section('content')
<div class="card">
<div class ="card-header">abonnements Scolaire</div>
<div class ="card-body"></div>
<table>
    <thead>
    <tr>
        <th>nomabonne</th>
        <th>prenomabonne </th>
        <th>prixtotale </th>
        <th>numero </th>
        <th>cartereference </th>
        <th>profileimage </th>
        <th>line_id</th>
        <th>societe_id</th>
        <th>payement_id</th>

    </tr>


    </thead>
    <tbody>
@foreach($data as $row)

    <th>{{$row->nom}}</th>
    <th>{{$row->prenomabonne}}</th>

    <th>{{$row->datenaissance}} </th>
    <th>{{ $row->adresse}} </th>
    <th>{{$row->telephone}} </th>
    <th>{{$row->prixtotale}} </th>
    <th>{{$row->numero}} </th>
    <th>{{$row->cartereference}} </th>

    <th>{{$row->profileimage}} </th>

    <th>{{$row->created_at}}Date du création</th>
<tr>



</tr>

    </tbody>
</table>
</div>




@endsection



