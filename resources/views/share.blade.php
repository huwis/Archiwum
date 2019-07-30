@extends('template')

@section('content')
<div class="container">    
    <form action="{{ action('ShareController@share')}}" method="post" role="form">
        <input type="hidden" name="_token" value="{{ csrf_token()}}" >
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
            <label for="first_name">Imię: </label>
            <input type="text" class="form-control"  name="first_name">
        </div>
        <div class="form-group">
            <label for="surname">Nazwisko: </label>
            <input type="text" class="form-control"  name="surname">
        </div>
        <div class="form-group">
            <label for="phone">Telefon: </label>
            <input type="number" class="form-control"  name="phone">
        </div>
        <div class="form-group">
            <label for="pesel">Pesel: </label>
            <input type="number" class="form-control"  name="pesel">
        </div>
        <input type="submit" value="Udostępnij dokument" class="btn btn-outline-primary">
    </form>
</div>
@endsection('content')