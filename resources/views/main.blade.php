@extends('template')

@section('content')
<div class="container">

    <form action="{{ action('MainController@store')}}" method="POST" role="form">
        <input type="hidden" name="_token" value="{{ csrf_token()}}" >
        <div class="form-group">
            <label for="name">Wyszukaj nazwę: </label>
            <input type="text" class="form-control"  name="name">    
        </div>
        <div class="form-group">
            <label for="place">Wyszukaj miejsce: </label>
            <input type="text" class="form-control"  name="place">
        </div>
        <div class="form-group">
            <label for="year_of_creation">Wyszukaj rok powstania: </label>
            <input type="number" class="form-control"  name="year_of_creation">
    
        </div>
        <div class="form-group">
            <label for="state">Wyszukaj status: </label>
            <select id="state"  name="state">
                <option value=""></option>
                <option value="Dostępny">Dostępny</option>
                <option value="Udostępniony">Udostępniony</option>
            </select>
        </div>
        <div class="form-group">
            <label for="description">Wyszukaj opis: </label>
            <textarea  class="form-control"  name="description"></textarea>    
        </div>
        <input type="submit" value="Wyszukaj dokument" class="btn btn-outline-primary">
    </form>
</div>

@endsection('content')
