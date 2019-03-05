@extends('layout.principal')
  
  @section('conteudo')

    <div class="titulo-detalhes">
      <h3>Detalhes do Usuario: {{$user->name}} </h3>
    </div>

      <div class="container-flex-box">
          <div class="flex-item1">
              <figure>
                <img class="img-detalhes" onerror="this.src='/storage/img-default.jpg';" src="{{$user->avatar}}" alt="Imagem" />
              </figure>
          </div>



            <div class="flex-item2">
                <ul>
                  <li>
                    <b>email:</b> {{$user->email}} 
                  </li>
                  <li>
                    <b>cpf:</b>  {{$user->cpf}}
                  </li>
              </ul>
            </div>
       </div>

@stop