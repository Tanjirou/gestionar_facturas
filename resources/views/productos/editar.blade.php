@extends('layouts.app')

@section('titulo', 'Editar Producto')

@section('contenido')
<div class="d-md-flex justify-content-md-center align-items-md-center">
    <div class="bg-white p-3 rounded-lg shadow-lg">
        <form action="{{ route('producto.editarstore') }}" method="POST" novalidate>
            @csrf
            <div class="mb-5">
                <label for="codigo" class="mb-2 text-dark font-weight-bold">
                    Código
                </label>
                <input type="text" value="{{ $producto->codigo }}" name="codigo" id="codigo" placeholder="Código"
                    class="@error('codigo') @enderror border p-3 w-100 rounded-lg">
                @error('codigo')
                    <p class="bg-danger text-white my-2 rounded-lg text-sm p-2 text-center">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="descripcion" class="mb-2 text-dark font-weight-bold">
                    Descripción
                </label>
                <input type="text" name="descripcion" id="descripcion" placeholder="descripcion"
                    class="@error('descripcion') border-danger @enderror border p-3 w-100 rounded-lg" value="{{$producto->descripcion}}">
                @error('descripcion')
                    <p class="bg-danger text-white my-2 rounded-lg text-sm p-2 text-center">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="precio" class="mb-2 text-dark font-weight-bold">
                    Precio
                </label>
                <input type="number" name="precio" id="precio" placeholder="precio"
                    class="@error('precio') border-danger @enderror border p-3 w-100 rounded-lg" value="{{$producto->precio}}">
                @error('precio')
                    <p class="bg-danger text-white my-2 rounded-lg text-sm p-2 text-center">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="cantidad" class="mb-2 text-dark font-weight-bold">
                    Cantidad
                </label>
                <input type="number" name="cantidad" id="cantidad" placeholder="cantidad"
                    class="@error('cantidad') border-danger @enderror border p-3 w-100 rounded-lg" value="{{$producto->cantidad}}">
                @error('cantidad')
                    <p class="bg-danger text-white my-2 rounded-lg text-sm p-2 text-center">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="impuesto" class="mb-2 text-dark font-weight-bold">
                    impuesto
                </label>
                <input type="text" name="impuesto" id="impuesto" placeholder="Ejemplo 0.1"
                    class="@error('impuesto') border-danger @enderror border p-3 w-100 rounded-lg" value="{{$producto->impuesto}}">
                @error('impuesto')
                    <p class="bg-danger text-white my-2 rounded-lg text-sm p-2 text-center">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <input type="hidden" name="id_producto" value="{{$producto->id}}">
            <button type="submit"
                class="bg-primary rsor-pointer uppercase font-bold w-100 text-white rounded-lg">Grabar</button>
        </form>
    </div>
</div>
@endsection
