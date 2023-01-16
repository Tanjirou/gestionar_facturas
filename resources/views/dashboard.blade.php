@extends('layouts.app')

@section('titulo','Inicio')

@section('contenido')
    @if(auth()->user()->tipo_usuario == 1)
       <div class="row justify-content-around">
        <a href="{{route('productos.index')}}" class="btn btn-lg btn-primary text-white">Gestionar Productos</a>
        <a href="{{route('facturas.index')}}" class="btn btn-lg btn-success text-white">Facturas no Generadas</a>
        <a href="{{route('facturas.procesadas')}}" class="btn btn-lg btn-secondary text-white">Facturas Procesadas</a>
    </div>
    @else
    <div class="row justify-content-around">
        <a href="{{route('compras.index')}}" class="btn btn-lg btn-primary text-white">Comprar</a>
        <a href="{{route('facturas.cliente')}}" class="btn btn-lg btn-secondary text-white">Mis Facturas</a>
       </div>
    @endif
@endsection
