@extends('layouts.app')
@section('titulo', 'Regístrate en SIADF')
@section('contenido')
    <div class="d-md-flex justify-content-md-center align-items-md-center">
        <div class="bg-white p-3 rounded-lg shadow-lg">
            <form action="{{ route('login') }}" method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="email" class="mb-2 text-dark font-weight-bold">
                        Correo
                    </label>
                    <input type="email" value="{{ old('email') }}" name="email" id="email" placeholder="Tu Email de Registro"
                        class="@error('email') @enderror border p-3 w-100 rounded-lg">
                    @error('email')
                        <p class="bg-danger text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password" class="mb-2 text-dark font-weight-bold">
                        Contraseña
                    </label>
                    <input type="password" name="password" id="password" placeholder="Password"
                        class="@error('password') border-danger @enderror border p-3 w-100 rounded-lg">
                    @error('password')
                        <p class="bg-danger text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <button type="submit"
                    class="bg-primary uppercase font-bold w-100 text-white rounded-lg">Iniciar Sesión</button>
            </form>
            @if(session('mensaje'))
            <p class="bg-danger text-white my-2 rounded-lg text-sm p-2 text-center">
                {{ session('mensaje') }}
            </p>
            @endif
        </div>
    </div>
@endsection
