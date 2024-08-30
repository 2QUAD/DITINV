@extends('layouts.auth')

@section('content')
<div class="text-center">
    <div class="my-5">
        <p class="fs-h3 text-secondary">
            {{ __('Obrigado por se inscrever! Antes de começar, por favor, verifique seu endereço de e-mail clicando no link que acabamos de enviar para você. Se você não recebeu o e-mail, ficaremos felizes em enviar outro.') }}
        </p>
    </div>
</div>

<form action="{{ route('verification.send') }}" method="POST" autocomplete="off">
    @csrf

    <button type="submit" class="btn btn-primary w-100">
        {{ __('Reenviar E-mail de Verificação') }}
    </button>

    <div class="mt-4">
        @if (session('status') == 'verification-link-sent')
            <div class="alert alert-success" role="alert">
                <div class="d-flex">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                    </div>
                    <div>
                        <div class="text-secondary">
                            {{ __('Um novo link de verificação foi enviado para o endereço de e-mail fornecido durante o registro.') }}
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</form>

<form action="{{ route('logout') }}" method="POST" autocomplete="off">
    @csrf

    <div class="form-footer">
        <button type="submit" class="btn btn-primary w-100">
            {{ __('Sair') }}
        </button>
    </div>
</form>
@endsection
