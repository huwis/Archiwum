@if ($errors->any())
        <div class="alert alert-danger" style="width: 50%; margin-left: auto;
            margin-right: auto; margin-top: 20px">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
@endif
    
    
@if(session()->has('message'))
    <div class="alert alert-success" style="width: 50%; margin-left: auto;
            margin-right: auto; margin-top: 20px">
            {{ session()->get('message') }}
    </div>
@endif