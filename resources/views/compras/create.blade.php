@extends('layouts.app')

@section('titulo','Comprar Producto')

@section('contenido')

<div class="row">
    <a href="{{route('compras.index')}}" class="btn btn-lg btn-primary text-white">Regresar</a>
</div>
@if(session()->has('message'))
{{session('message')}}
@endif
<div class="row mt-3">
<table class="table">
    <thead>
      <tr class="text-center">
        <th scope="col">Descripción</th>
        <th scope="col">Precio</th>
        <th scope="col">Impuesto</th>
        <th scope="col">Opciones</th>
      </tr>
    </thead>
    <tbody>
     @foreach ($productos as $producto)
         <tr class="text-center">
            <th>{{$producto->descripcion}}</th>
            <th>{{$producto->precio}}</th>
            <th>{{$producto->impuesto*100}}%</th>
            <th class="d-flex justify-content-around align-items-center align-content-center">
                <form action="{{route('compras.store')}}" method="POST">
                    @csrf
                    <input type="hidden" name="id_producto" value="{{$producto->id}}">
                    <input type="hidden" name="precio" value="{{$producto->precio}}">
                    <input type="hidden" name="impuesto" value="{{$producto->impuesto}}">
                    <button type="submit" class="btn btn-success">Comprar</button>
                </form>
            </th>
         </tr>
     @endforeach
    </tbody>
  </table>
</div>
@endsection
