@extends('commons.layouts.extras.app')
@section('body_content')

    <div class="row no-gutters min-h-fullscreen bg-white">

        @include('commons.layouts.extras.left')

        <div class="col-md-6 col-lg-5 col-xl-4 align-self-center">
            <div class="px-80 py-30">

                <h4>Atualizar Senha</h4>
                @include('commons.layouts.inc.alerts')
                <br>

                <form class="form-horizontal" data-provide="validation" method="POST" action="{{ route('password.request') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control" name="email"
                               value="{{ $email or old('email') }}" required autofocus>
                        <div class="invalid-feedback"></div>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password">Senha</label>
                        <input id="password" type="password" class="form-control" name="password" required>
                        <div class="invalid-feedback"></div>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <label for="password-confirm">Confirmar Senha</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        <div class="invalid-feedback"></div>
                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>

                    <br>
                    <button class="btn btn-bold btn-block btn-info" type="submit">Atualizar Senha</button>
                </form>
            </div>
        </div>
    </div>
@endsection
