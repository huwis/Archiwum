@extends('template')

@section('content')


<div class="container">
    
    <form action="{{ action('EditController@edit')}}" method="POST" role="form">
        <input type="hidden" name="_token" value="{{ csrf_token()}}" >
        <input type="hidden" name="_method" value="PUT" >
        <input type="hidden" name="id" value="{{$document->id}}">
        <input type="hidden" name="state" value="{{$document->state}}">
        <div class="form-group">
            <label for="name">Nazwa: </label>
            <input type="text" class="form-control"  name="name" value="{{$document->name}}">
        </div>
        <div class="form-group">
            <label for="place">Miejsce: </label>
            <input type="text" class="form-control"  name="place" value="{{$document->place}}">
        </div>
        <div class="form-group">
            <label for="year_of_creation">Rok powstania: </label>
            <input type="number" class="form-control"  name="year_of_creation" value="{{$document->year_of_creation}}">
        </div>
        <div class="form-group">
            <label for="description">Opis: </label>
            <textarea   class="form-control"  name="description" >{{$document->description}}</textarea>
        </div>
        <input type="submit" value="Edytuj dokument" class="btn btn-outline-primary">
    </form>
</div>
@endsection('content')
