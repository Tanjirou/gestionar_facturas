@extends('layouts.app')

@section('titulo', 'Listado de Facturas no Generadas')

@section('contenido')
    <div class="row justify-content-around">
        <a href="{{ route('dashboard') }}" class="btn btn-lg btn-primary text-white">Regresar</a>
        <form action="{{route('facturas.store')}}" method="POST">
            @csrf
            <button type="submit" class="btn btn-lg btn-success text-white">Generar Factura</button>
        </form>

    </div>
    <div class="row mt-3 justify-content-center">
        @if (count($compras)>0)
            <table class="table">
                <thead>
                    <tr class="text-center">
                        <th scope="col">Cliente</th>
                        <th scope="col">Producto</th>
                        <th scope="col">Monto Producto con Impuesto</th>
                        <th scope="col">Monto Impuesto</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($compras as $compra)
                        <tr class="text-center">
                            <td>{{ $compra->name }}</td>
                            <td>{{ $compra->descripcion }}</td>
                            <td>{{ $compra->monto_impuesto * $compra->monto_producto + $compra->monto_producto }}</td>
                            <td>{{ $compra->monto_impuesto }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <h3 class="text-center mt-5">No hay facturas pentiendes por Procesar</h3>
        @endif

    </div>
@endsection
