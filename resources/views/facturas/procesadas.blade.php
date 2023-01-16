@extends('layouts.app')

@section('titulo', 'Listado de Facturas no Generadas')

@section('contenido')
    <div class="row ">
        <a href="{{ route('dashboard') }}" class="btn btn-lg btn-primary text-white">Regresar</a>

    </div>
    <div class="row mt-3 justify-content-center">
        @if(count($facturas)>0)
            <table class="table">
                <thead>
                    <tr class="text-center">
                        <th scope="col">Cliente</th>
                        <th scope="col">Monto Producto con Impuesto</th>
                        <th scope="col">Impuesto</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($facturas as $factura)
                        <tr class="text-center">
                            <td>{{$factura->name}}</td>
                            <td>{{$factura->monto_total}}Bs</td>
                            <td>{{$factura->impuesto_total}}Bs</td>
                            <td><a class="btn btn-secondary" href="{{route('facturas.detallefactura',['factura'=>$factura->id])}}">Ver detalle</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @else
                <h3 class="text-center mt-5">No hay facturas procesadas</h3>
            @endif



    </div>
@endsection
