<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('css/styles.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('css/fontello.css')}}">
    <script src="{{URL::asset('js/date.js')}}"></script>
  
  </head>
  <body onload="timer();">
      
    <div class="container">
        <header>
            <div class="link" style="float: left;">
                <a  href="{{URL::route('log')}}" >Zaloguj się</a>
            </div>
            <div id="date" style="float: right; "></div>
            <div style="clear:both;"></div> 
        </header>
          
        
    @include('flash-message')
          
        <div class="login">  
            <form action="{{ action('RegController@store')}}" method="POST" role="form">
                <input type="hidden" name="_token" value="{{ csrf_token()}}" >
                <input type="hidden" name="_method" value="PUT" >
                <h4> Zarejestruj</h4> 
                <div class="form-group">
                    <label for="first_name">Imię: </label>
                    <input type="text" class="form-control" name="first_name"  />
                </div>
                <div class="form-group">
                    <label for="surname">Nazwisko: </label>
                    <input type="text" class="form-control" name="surname"  />
                </div>
                <div class="form-group">
                    <label for="pesel">Pesel: </label>
                    <input type="number" class="form-control" name="pesel"  />
                </div>
                <div class="form-group">                
                    <label for="name">Nazwa użytkownika: </label>
                    <input type="text" class="form-control" name="name"  />
                </div>
                <div class="form-group">
                    <label for="password">Hasło: </label>
                    <input type="password" class="form-control" name="password"  />
                </div>
                <input type="submit" value="Zarejestruj" class="btn btn-outline-primary"  />
            </form>
        </div>
    

    </div>

      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>



