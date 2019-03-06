@extends('layout.principal')
  
  @section('conteudo')

    @if(old('name'))
    
    <div class="alert alert-success">
      <strong>Sucesso!</strong> 
        O Usuario {{ old('name') }} foi adicionado.
      </div>
    @endif

    <form class="navbar-form navbar-right" action="/usuarios/pesquisar" method="post">
        <div class="form-group container-barra-pesquisa">
            {!! csrf_field() !!}
            <select name="seletorPesquisa" class="form-control campo-selecao">
              <option >Nome</option>
              <option >Email</option>
              <option >CPF</option>
            </select>
            <input type="text" name="texto"  class="form-control campo-pesquisa" placeholder="Pesquisar">
            <button type="submit" class="btn btn-success btn-pesquisar">Pesquisar</button>
        </div>
    </form>

    @if(empty($usuarios))
      <div class="alert alert-danger">
        Você não tem nenhum Usuario cadastrado.
      </div>
    @else
      <table class="table custom-table">
      <thead class="thead-dark">
        <tr >
          <th scope="col"></th>
          <th scope="col">NOME</th>
          <th scope="col">EMAIL</th>
          <th scope="col">CPF</th>
          <th scope="col"></th>
          <th scope="col"></th>
          <th scope="col"></th>
        </tr>
      </thead>
        @foreach ($usuarios as $user)
        <tr class="{{$user->situacao_id == 2 ? 'alert alert-dark borda-black' : '' }}">
          <td> <img class="img-thumbnail" onerror="this.src='/storage/img-default.jpg';" src="{{$user->avatar}}" alt="Imagem"></td>
          <td> {{$user->name}}</td>
          <td> {{$user->email}}</td>
          <td> {{$user->cpf}}</td>
          <td><a href="{{action('UsuarioController@mostra', $user->id)}}"><i class="fas fa-address-card"></i></a></td>
          <td><a href="{{action('UsuarioController@alterar', $user->id)}}"><i class="fas fa-user-edit"></i></a></td>
          <td><a href="{{action('UsuarioController@remove', $user->id)}}"><i class="fas fa-trash-alt"></i></a></td>
        </tr>
        @endforeach
    </table>

      {{$usuarios->links()}}

    @endif


@stop