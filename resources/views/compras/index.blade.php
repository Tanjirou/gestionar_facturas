@extends('layouts.app')

@section('titulo','Listado de productos comprados')

@section('contenido')
<div class="row justify-content-around">
    <a href="{{route('dashboard')}}" class="btn btn-lg btn-secondary text-white">Regresar</a>
    <a href="{{route('compras.create')}}" class="btn btn-lg btn-primary text-white">Comprar Producto</a>
</div>
<div class="row mt-3 justify-content-center">
    @if (count($compras)>0)
        <table class="table mt-3">
            <thead>
            <tr class="text-center">
                <th scope="col">Producto</th>
                <th scope="col">Monto a facturar</th>
                <th scope="col">Impuesto</th>
                <th scope="col">Estatus</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($compras as $compra)
                    <tr class="text-center">
                        <td>{{$compra->descripcion}}</td>
                        <td>{{$compra->monto_producto}}Bs</td>
                        <td>{{$compra->monto_impuesto}}</td>
                        <td>{{($compra->estatus=='A') ? 'Pendiente por facturar' : 'Facturado'}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h3 class="text-center mt-5">No se ha generado ninguna compra</h3>
    @endif
</div>
@endsection
