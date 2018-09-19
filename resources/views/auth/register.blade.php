@extends('layouts.app')

@section('content')
<script src="{{ asset('js/jquery-3.2.1.js') }}"></script>
<script src="{{ asset('js/jquery.maskedinput.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready( function() {
        $('#celular').mask('(99).99999-9999');
        $('#telefone').mask('(99).9999-9999');
        $('#cpf').mask('999.999.999-99');
        $('#valor').mask('999.999.999');
        $('#cnpj').mask('99.999.999/9999-99');
    });
</script>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Cadastro</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nome</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">	Email </label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div>
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Celular</label>
                                    <div class="col-md-6">
                                        <input id="celular" type="text" class="form-control" name="celular" value="{{ old('celular') }}" >

                                        @if ($errors->has('celular'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('celular') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                        </div>

                                <div>
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="name" class="col-md-4 control-label">CEP</label>
                                        <div class="col-md-6">
                                            <input id="cep" type="text" class="form-control" name="celular" value="{{ old('cep') }}" >

                                            @if ($errors->has('cep'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('cep') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div>
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="name" class="col-md-4 control-label">Endereço</label>
                                        <div class="col-md-6">
                                            <input id="endereço" type="text" class="form-control" name="endereço" value="{{ old('endereço') }}" >

                                            @if ($errors->has('endereço'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('endereço') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                     

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Senha</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmar Senha </label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
