@extends('layouts.app')

@section('titulo', 'Listado de Facturas no Generadas')

@section('contenido')
    <div class="row ">
        @if(auth()->user()->tipo_usuario == 1)
            <a href="{{ route('facturas.procesadas') }}" class="btn btn-lg btn-primary text-white">Regresar</a>
        @else
            <a href="{{ route('facturas.cliente') }}" class="btn btn-lg btn-primary text-white">Regresar</a>
        @endif
    </div>
    <div class="row mt-3 justify-content-center">
            <table class="table">
                <thead>
                    <tr class="text-center">
                        <th scope="col">Producto</th>
                        <th scope="col">Monto Producto con Impuesto</th>
                        <th scope="col">Impuesto%</th>
                    </tr>
                </thead>
                <tbody>
                      @foreach ($detalle_facturas as $detalle_factura)
                      <tr class="text-center">
                        <td>{{$detalle_factura->producto}}</td>
                        <td>{{$detalle_factura->precio}}Bs</td>
                        <td>{{$detalle_factura->impuesto}}</td>
                    </tr>
                      @endforeach
                </tbody>
            </table>
    </div>
@endsection
