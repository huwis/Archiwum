@extends('template')

@section('content')


<div class="container">
    
    <form action="{{ action('AddController@store')}}" method="POST" role="form">
        <input type="hidden" name="_token" value="{{ csrf_token()}}" >
        <input type="hidden" name="_method" value="PUT" >
        <div class="form-group">
            <label for="name">Nazwa: </label>
            <input type="text" class="form-control"  name="name">
        </div>
        <div class="form-group">
            <label for="place">Miejsce: </label>
            <input type="text" class="form-control"  name="place">
        </div>
        <div class="form-group">
            <label for="year_of_creation">Rok powstania: </label>
            <input type="number" class="form-control"  name="year_of_creation">
        </div>
        <div class="form-group">
            <label for="description">Opis: </label>
            <textarea   class="form-control"  name="description"></textarea>
        </div>
        <input type="submit" value="Dodaj dokument" class="btn btn-outline-primary">
    </form>
</div>
@endsection('content')