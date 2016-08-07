<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">

  <!-- Compiled and minified JavaScript -->
        
          

    </head>
    <body>
        @include('common.errors')
        
                  <div class="parallax-container">
                    <div class="parallax"><img src="images/image1.jpg"></div>
                  </div>
                 <div class="section white">
                    <div class="row container">
                      <h2 class="header">Parallax</h2>
                      <p class="grey-text text-darken-3 lighten-3">Parallax is an effect where the background content or image in this case, is moved at a different speed than the foreground content while scrolling.</p>
                      <a class="waves-effect waves-light btn center-align" id="btnUsers">Usuarios</a>
                    </div>
                  </div>
                  <div class="parallax-container">
                    <div class="parallax"><img src="images/image4.jpg"></div>
                  </div>
    </body>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/init.js"></script>
    <script>
        $(document).ready(function(){
          $('.parallax').parallax();
        });
           
        $('#btnUsers').click(function(){
            window.location.replace("usuario");
        });
    </script>
</html>
