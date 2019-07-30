<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('css/styles.css')}}">
    <script src="{{URL::asset('js/date.js')}}"></script>
  
  </head>

  <body onload="timer();">
      
    <div class="container" >
        <header>
            <div class="link" style="float: left;">
                <a href="{{URL::route('reg')}}">Zarejestruj się</a>
            </div>            
            <div id="date" style="float: right; "></div>
            <div style="clear:both;"></div> 
        </header>
          
    @include('flash-message')

        <div class="login">  
            <form action="{{ action('logController@authenticate')}}" method="POST" role="form" name='form1'>
                <input type="hidden" name="_token" value="{{ csrf_token()}}" >
                <br></br>
                <h4>Zaloguj</h4> 
                <div class="form-group">
                    <label for="login">Login </label>
                    <input type="text" name="name"  />
                </div>
                <div class="form-group">
                    <label for="pass">Hasło </label>
                    <input type="password" name="password"  />
                </div>
                <input type="submit" value="Zaloguj"  class="btn btn-outline-primary"  />
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

