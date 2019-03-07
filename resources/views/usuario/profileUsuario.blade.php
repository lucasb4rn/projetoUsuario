@extends('layout.principal')
  
  @section('conteudo')

  <div class="row container-profile">
    <div class="col-md-4 img">
      <img src="{{$user->avatar}}" alt="" onerror="this.src='https://s3-sa-east-1.amazonaws.com/imagensbucket/IMAGEM-PADRAO.png';" class="img-rounded demitacao-imagem">
    </div>
    <div class="col-md-6 caixa-texto-profile" >
        <label>NOME DO USUARIO LOGADO:</label>
        <h4>{{$user->name}}</h4>
        
        <label>EMAIL:</label>
        <h4>EMAIL{{$user->email}}</h4>

        <label>DATA NASCIMENTO:</label>
        <h4>{{$user->data_nascimento}}</h4>

        <label>SITUAÇÃO:</label>
        <h4>{{$user->situacao->nome}}</h4>
    </div>
  </div>
     
@stop