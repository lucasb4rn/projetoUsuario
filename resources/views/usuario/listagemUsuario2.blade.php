@extends('layout.principal')
  
  @section('conteudo')

    @if(old('name'))
    


    <div class="alert alert-success">
      <strong>Sucesso!</strong> 
        O Usuario {{ old('name') }} foi adicionado.
      </div>
    @endif

    <form class="navbar-form navbar-right" action="" method="post">
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

        <div id="teste">

          <tr  v-for="repo in repos">
              <td> <img class="img-thumbnail" onerror="this.src='https://s3-sa-east-1.amazonaws.com/imagensbucket/IMAGEM-PADRAO.png';" src="repo.avatar" alt="Imagem"></td>
              <td> @{{repo.name}}</td>
              <td> @{{repo.email}}</td>
              <td> @{{repo.cpf}}</td>
          </tr>

        </div>
        
    </table>

      {{$usuarios->links()}}

    @endif


    <script src="{{asset('js/app.js')}}"></script>  

@stop