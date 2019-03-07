@extends('layout.principal')
  
  @section('conteudo')

    <div class="titulo-detalhes">
      <h3>Usuario: {{$user->name}} </h3>
    </div>

      <div class="container-flex-box">
          <div class="flex-item1">
              <figure>
                <img class="img-detalhes" onerror="this.src='https://s3-sa-east-1.amazonaws.com/imagensbucket/IMAGEM-PADRAO.png';" src="{{$user->avatar}}" alt="Imagem" />
              </figure>
          </div>



            <div class="flex-item2">
                <ul>
                  <li>
                    <b>EMAIL:</b> {{$user->email}} 
                  </li>
                  <li>
                    <b>CPF:</b>  {{$user->cpf}}
                  </li>
                  <li>
                    <b>SITUACAO:</b>  {{$user->situacao->nome}}
                  </li>
              </ul>
            </div>
       </div>

@stop