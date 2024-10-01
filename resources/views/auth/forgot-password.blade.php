@extends('layouts.auth')

@section('content')
<form class="card card-md" action="{{ route('password.email') }}" method="post" autocomplete="off" novalidate>
    @csrf

    <div class="card-body">
        <h2 class="card-title text-center mb-4">
            Olvidé mi contraseña
        </h2>

        <p class="text-secondary mb-4">
            Ingresa tu dirección de correo y la contraseña será reiniciada y enviada en un correo.
        </p>

        <div class="mb-3">
            <label for="email" class="form-label">
                Correo electrónico
            </label>
            <input type="email" name="email" id="email"
                   class="form-control @error('email') is-invalid @enderror"
                   placeholder="Ingresa tu correo"
            >

            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-footer">
            <button type="submit" class="btn btn-primary w-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z" /><path d="M3 7l9 6l9 -6" /></svg>
                Enviar nueva contraseña
            </button>
        </div>
    </div>
</form>
<div class="text-center text-secondary mt-3">
    Olvídalo, <a href="{{ route('login') }}">regresáme</a> al inicio de sesión.
</div>
@endsection
