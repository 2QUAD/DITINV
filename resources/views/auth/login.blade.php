@extends('layouts.auth')

@section('content')
<div class="card card-md">
    <div class="card-body">
        <h2 class="h2 text-center mb-4">
            INVENTARIO T.I JURU
        </h2>
        <form action="{{ route('login') }}" method="POST" autocomplete="off">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">
                    Email
                </label>
                <input type="email"
                       name="email"
                       id="email"
                       class="form-control @error('email') is-invalid @enderror"
                       placeholder="mail@email.com"
                       autocomplete="off"
                       value="{{ old('email') }}"
                >

                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">
                    Senha
                </label>

                <div class="input-group input-group-flat">
                    <input type="password"
                           name="password"
                           id="password"
                           class="form-control @error('password') is-invalid @enderror"
                           placeholder="Digite sua senha"
                           autocomplete="off"
                    >

                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="mb-2">
                <label for="remember" class="form-check">
                    <input type="checkbox" id="remember" name="remember" class="form-check-input"/>
                    <span class="form-check-label">Salvar sessão neste dispositivo</span>
                </label>
            </div>

            <div class="form-footer">
                <button type="submit" class="btn btn-primary w-100">
                    Entrar
                </button>
            </div>
        </form>
    </div>
</div>
<div class="text-center text-secondary mt-3">
    Ainda não tem conta? <a href="{{ route('register') }}" tabindex="-1">
       Inscrever-se
    </a>

    <span class="form-label-description">
        <a href="{{ route('password.request') }}">Esqueci a senha</a>
    </span>
</div>
@endsection
