@extends('layouts.app')
@section('titulo', 'Regístrate en SIADF')
@section('contenido')
    <div class="d-md-flex justify-content-md-center align-items-md-center">
        <div class="bg-white p-3 rounded-lg shadow-lg">
            <form action="{{ route('register') }}" method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="name" class="mb-2 text-dark font-weight-bold">
                        Nombre
                    </label>
                    <input type="text" value="{{ old('name') }}" name="name" id="name" placeholder="Tu Nombre"
                        class="@error('name') border-danger  @enderror border p-3 w-100 rounded-lg">
                    @error('name')
                        <p class="bg-danger text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
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
                <div class="mb-5">
                    <label for="password_confirmation" class="mb-2 text-dark font-weight-bold">
                        Repetir Contraseña
                    </label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Password"
                        class="@error('password_confirmation') border-danger @enderror border p-3 w-100 rounded-lg">
                    @error('password_confirmation')
                        <p class="bg-danger text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <button type="submit"
                    class="bg-primary rsor-pointer uppercase font-bold w-100 text-white rounded-lg">Registrarse</button>
            </form>
        </div>
    </div>
@endsection
