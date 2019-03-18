<html>
<head>

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link href="/css/app.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link href="/css/ListaUsuario.css" rel="stylesheet">
  <link href="/css/detalhesUsuario.css" rel="stylesheet">
  <link href="/css/cadastroUsuario.css" rel="stylesheet">
  <link href="/css/alterarUsuario.css" rel="stylesheet">
  <link href="/css/login.css" rel="stylesheet">
  <link href="/css/profileUsuario.css" rel="stylesheet">
  <link href="/css/global.css" rel="stylesheet">
  <link href="/css/uploadFormComponent.css" rel="stylesheet">
  
  
  @yield('styles')
  
  
  <title>Controle de Usuarios</title>
  
</head>
<body>

      <nav class="navbar navbar-default navbar-expand-lg">
        <div class="container-fluid">

        <div class="navbar-header">      
          <a class="navbar-brand nav-logo-titulo" href="{{action('UsuarioController@listaUsuarios')}}">Controle de Usuarios</a>
        </div>

          <ul class="nav  navbar-nav navbar-right ">
            @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @endguest
            <li><a class="nav-item nav-link" href="{{ url('/profileUsuario') }}">Profile</a></li>
            <li><a class="nav-item nav-link" href="{{action('UsuarioController@cadastroUsuario')}}">Cadastrar Usuario</a></li>
            <li><a class="nav-item nav-link" href="{{action('UsuarioController@listaUsuarios')}}">Lista de Usuarios</a></li>
            @if(auth()->guest())
              @else
            <li><a class="nav-item nav-link" href="{{ url('/auth/logout') }}">Logout</a></li>
              @endif
          </ul>


        </div>
      </nav>

      <div class="container">

      @yield('conteudo')

      </div>
      
      <footer class="footer footer-bottom">
          <p>© Usuarios com Laravel.</p>
      </footer>
  
</body>
</html>