@extends('layout.principal')
  
  @section('conteudo')

    @if(old('name'))
    
    <div class="alert alert-success">
      <strong>Sucesso!</strong> 
        O Usuario {{ old('name') }} foi adicionado.
      </div>
    @endif

    @if(empty($usuarios))
      <div class="alert alert-danger">
        Você não tem nenhum Usuario cadastrado.
      </div>
    @else

      <div id="app2">

            <lista-usuario> </lista-usuario>

    </div>

    @endif

    <script src="{{asset('js/app.js')}}"></script>  

@stop