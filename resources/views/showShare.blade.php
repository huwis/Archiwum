@extends('template')

@section('content')
<table class="table table-bordered" id="tableToSort">
    <thead>
        <tr>
            <th scope="col">Id dokumentu</th>
            <th scope="col">Użytkownik</th>
            <th scope="col">Imię</th>
            <th scope="col">Nazwisko</th>
            <th scope="col">Pesel</th>
            <th scope="col">Telefon</th>
            <th scope="col">Data wypożyczenia</th>
            <th scope="col">Data zwrotu</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($sharesList as $share)
            <tr> 
                <th scope="row">{{ $share->document_id}}</th>
                <td>{{ $share->user->name}}</td>
                <td>{{ $share->first_name }}</td>
                <td>{{ $share->surname }}</td>
                <td>{{ $share->pesel }}</td>
                <td>{{ $share->phone }}</td>
                <td>{{ $share->date_of_share }}</td>
                <td>{{ $share->date_of_return }}</td>
            </tr>    
        @endforeach
    </tbody>
</table>
@endsection('content')
