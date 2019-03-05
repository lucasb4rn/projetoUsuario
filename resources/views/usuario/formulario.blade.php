@extends('layout.principal')
  
  @section('conteudo')

  <script src="main.js"></script>

    <div class="titulo-cadastro">
        <h1>Novo Usuario</h1>
    </div>

    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
    @endif

    <form action="/usuarios/adiciona" method="post" enctype="multipart/form-data" >

         <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />


            <div class="container-flex-cadastro">
                
                <div class="flex-item-imagem" id="app">
                    <upload-form></upload-from>
                </div>


                 <div class="flex-item-cadastro">

                    <div class="form-group">
                        <label >Nome: </label>
                        <input name="name" class="form-control"/>    
                    </div>


                    <label class="sr-only" for="inlineFormInputGroup">Username</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">@</div>
                            </div>
                        <input type="text" name="email" class="form-control" id="inlineFormInputGroup" placeholder="name@example.com">
                    </div>

                    <div class="container-flex-email-cpf">

                        <div class="form-group flex-item-cpf">
                            <label >CPF: </label>
                            <input name="cpf" class="form-control"/>    
                        </div>

                        <div class="form-group flex-item-data-nascimento">
                            <label >Data Nascimento: </label>
                            <input type="date" name="data_nascimento" class="form-control"/>    
                        </div>

                    </div>

                    <div class="form-group campo-senha">
                        <label >Senha: </label>
                        <input type="password" name="password" class="form-control"/>    
                    </div>

                    <div class="form-group campo-senha">
                        <label >Confirmação da Senha: </label>
                        <input type="password" name="password1" class="form-control"/>    
                    </div>

                    <div class="form-group">
                    <label>Situacao</label>
                    <select name="situacao_id" class="form-control">
                        @foreach($situacao as $s)
                        <option value="{{$s->id}}">{{$s->nome}}</option>
                        @endforeach
                    </select>    
                    </div>


                </div>

            </div>


        <button class="btn btn-primary btn-block btn-adicionar-usuario" type="submit">Adicionar</button>
        
    </form>


   <script src="{{asset('js/app.js')}}"></script>   

@stop