@extends('layout.principal')


@section('conteudo')

    <div class="titulo-alterarUsuario">
        <h1>Alterar Usuario</h1>
    </div>


    <form action="/usuarios/alterar/{{$user->id}}" method="post" enctype="multipart/form-data">
    
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

        <div class="container-flex-alterarUsuario">
            <div class="item-flex-imagemAlterar">
                <div id="app1">
                    <upload-form-alterar :user="{{$user}}"></upload-form-alterar>
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

                <div class="form-group">
                    <label>Situacao</label>
                    <select name="situacao_id" class="form-control">
                        @foreach($situacao as $s)
                            @if($user->situacao_id != $s->id)
                            <option value="{{$s->id}}">{{$s->nome}}</option>
                            @else {
                            <option value="{{$s->id}}" selected>{{$s->nome}}</option>
                            }
                            @endif
                        @endforeach
                    </select>    
                </div>

            </div>

        </div>
         
         <button type="submit" class="btn btn-success botaoAlterar">Alterar</button>

    </form>


    <script src="{{asset('js/app.js')}}"></script>   

@stop