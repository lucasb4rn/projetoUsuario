@extends('layout.principal')


  @section('conteudo')

    <div class= "login-container container-login-customizado">
        <div class="col-md-6 login-form-2">
                <h3>LOGIN, SEJA BEM VINDO!!</h3>
                <form action="/login" method="post">
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

                    <div class="form-group">
                        <input placeholder="Digite o email" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                    </div>

                    <div class="form-group">
                        <input placeholder="Digite a senha" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                             @endif
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btnSubmit" value="Login" />
                    </div>
            </form>
        </div>
    </div>

@stop