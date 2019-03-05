<html>
<head>
  <link href="/css/app.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link href="/css/ListaUsuario.css" rel="stylesheet">
  <link href="/css/detalhesUsuario.css" rel="stylesheet">
  <link href="/css/cadastroUsuario.css" rel="stylesheet">
  <link href="/css/alterarUsuario.css" rel="stylesheet">

    <title>Controle de Usuarios</title>
    
</head>
<body>
<div class="container">
      <nav class="navbar navbar-default navbar-expand-lg">
        <div class="container-fluid">

        <div class="navbar-header">      
          <a class="navbar-brand" href="{{action('UsuarioController@listaUsuarios')}}">Controle de Usuarios</a>
        </div>

          <ul class="nav  navbar-nav navbar-right ">
            <li><a class="nav-item nav-link" href="{{action('UsuarioController@novo')}}">Adicionar Usuario</a></li>
            <li><a class="nav-item nav-link" href="{{action('UsuarioController@listaUsuarios')}}">Listagem</a></li>
            @if(auth()->guest())
              @else
            <li><a class="nav-item nav-link" href="{{ url('/auth/logout') }}">Logout</a></li>
              @endif
          </ul>


        </div>
      </nav>

      @yield('conteudo')
      
      <footer class="footer">
          <p>© Usuarios com Laravel.</p>
      </footer>
  </div>
</body>
</html>