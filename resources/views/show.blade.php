@extends('template')


@section('content')



<table class="table table-striped table-bordered table-sm" cellspacing="0" width="100%" id="tableToSort">
  <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Nazwa</th>
        <th scope="col">Opis</th>
        <th scope="col">Miejsce</th>
        <th scope="col" style="white-space: nowrap">Rok powstania</th>
        <th scope="col">Status</th>
        <th scope="col">    
            <div>
                <form onsubmit="onSubmitForm()" action="" method="" name="choose" role="form" id="formDelete">
                    <input type="hidden" name="_token" value="{{ csrf_token()}}" >
                    <input type="hidden" name="_method" value="" id="method">
                        <select  id="choose">
                            <option value="Delete">Usuń</option>
                            <option value="Return">Zwróć</option>
                            <option value="Share">Udostępnij</option>
                            <option value="Export">Eksportuj</option>
                        </select>
                    <input type="submit" value="Wybierz">
                </form>
            </div>
        </th>




    </tr>
  </thead>
  
  <tbody>
        @foreach ($documentsList as $documents)
            <tr> 
                <td>  <a href="{{route('edit',['id'=>$documents->id])}}">{{ $documents->id}}</a></td>
                <td style="word-wrap: break-word; word-break: break-all; white-space: normal;">{{ $documents->name }}</td>
                <td style="word-wrap: break-word; word-break: break-all; white-space: normal;">{{ $documents->description }}</td>
                <td style="word-wrap: break-word; word-break: break-all; white-space: normal;">{{ $documents->place }}</td>
                <td>{{ $documents->year_of_creation }}</td>
                <td>{{ $documents->state }}</td>
                <td><input type="checkbox" name="deletes[]"  value="{{$documents->id}}" form="formDelete"></td>       
            </tr>
    
        @endforeach
  </tbody>
</table>
@endsection

