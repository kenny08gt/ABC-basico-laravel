<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../css/materialize.min.css">
    <link rel="stylesheet" href="../css/style.css" type="text/css" />
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

</head>
<body id="app-layout">
    <nav class=" light-primary-color" role="navigation">
    <div class="nav-wrapper container"><!-- Branding Image -->
                <a id="logo-container" href="../" class="brand-logo" href="{{ url('/') }}">
                    Laravel
                </a>
                <!-- Left Side Of Navbar -->
                <ul class="right hide-on-med-and-down">
                    <li><a href="{{ url('/usuario') }}">Home</a></li>
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <!-- Dropdown Trigger -->
                          <a class='dropdown-button btn light-primary-color' href='#' data-activates='dropdown1'>
                              <i class=" material-icons right">account_circle</i>{{ Auth::user()->name }}
                          </a>
                    
                      <!-- Dropdown Structure -->
                      <ul id='dropdown1' class='dropdown-content'>
                        <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                      </ul>
                    @endif
                </ul>
      <ul id="nav-mobile" class="side-nav">
        <li><a href="#">Navbar Link</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
    @yield('content')

    <!-- JavaScripts 
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    -->
    <script src="https://code.jquery.com/jquery-2.1.1.js"></script>
    <script src="../js/materialize.min.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    <script type="text/javascript">
    @yield('scripts')
    
        $(document).ready(function() {
            $('select').material_select();
        });
    </script>
</body>
</html>
