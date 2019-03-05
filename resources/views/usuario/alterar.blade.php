@extends('layout.principal')


@section('conteudo')

<script src="main.js"></script>
    <div class="titulo-alterarUsuario">
        <h1>Alterar Usuario</h1>
    </div>


    <form action="/usuarios/alterar/{{$user->id}}" method="post" enctype="multipart/form-data">
    
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

        <div class="container-flex-alterarUsuario">
            <div class="item-flex-imagemAlterar">
                <div id="app">
                    <Upload-Form :user='{{ $user }}'></Upload-Form>
                </div> 
            </div>

            <div class="flex-item-dadosAlterar">
                <div class="form-group">
                    <label>Nome</label>
                    <input name="name" class="form-control" value="{{$user->name}}">
                </div>
                <div class="form-group">
                    <label>email</label>
                    <input name="email" class="form-control" value="{{$user->email}}">
                </div>
                <div class="form-group">
                    <label>cpf</label>
                    <input name="cpf" type="text" class="form-control" value="{{$user->cpf}}">
                </div>
                <div class="form-group">
                    <label>Data nascimento</label>
                    <input name="data_nascimento" type="data" class="form-control" value="{{$user->data_nascimento}}">
                </div>
            </div>
        </div>
         
         <button type="submit" class="btn btn-success botaoAlterar">Alterar</button>

    </form>


    <script src="{{asset('js/app.js')}}"></script>   

@stop