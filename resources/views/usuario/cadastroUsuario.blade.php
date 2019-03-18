@extends('layout.principal')
  
  @section('conteudo')

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

    <!-- <form action="/usuarios/adicionaUsuario" v-on:submit.prevent method="post" enctype="multipart/form-data" >

         <input type="hidden" name="_token" value="{{{ csrf_token() }}}" /> -->


                
            <div id="formCadastro">

                

                    <form-cadastro :situacao="{{$situacao}}" > </form-cadastro>


            </div> 

         


                 <!-- <div class="flex-item-cadastro">

                    <div class="form-group">
                        <label >Nome: </label>
                        <input name="name" value="{{ old('name') }}" class="form-control"/>    
                    </div>                  

                    <label >Email: </label>
                    <label class="sr-only" for="inlineFormInputGroup">Email</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">@</div>
                            </div>
                        <input placeholder="name@example.com" id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
                    </div>
                 

                    <div class="container-flex-email-cpf">

                        <div class="form-group flex-item-cpf">
                            <label >CPF: </label>
                            <input name="cpf" value="{{ old('cpf') }}"class="form-control"/>    
                        </div>

                        <div class="form-group flex-item-data-nascimento">
                            <label >Data Nascimento: </label>
                            <input type="date" name="data_nascimento" value="{{ old('data_nascimento') }}"class="form-control"/>    
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

                    <button class="btn btn-primary btn-block btn-adicionar-usuario" @submit.prevent type="submit">Adicionar</button>

                </div> -->
                


        
    <!-- </form> -->


   <script src="{{asset('js/app.js')}}"></script>   

@stop