@extends('layouts.app')

@section('titulo', 'Listado de Productos')

@section('contenido')
    <div class="row justify-content-around">
        <a href="{{route('dashboard')}}" class="btn btn-lg btn-secondary text-white">Regresar</a>
        <a href="{{route('productos.register')}}" class="btn btn-lg btn-primary text-white">Cargar Producto</a>
    </div>
    @if(session()->has('message'))
        {{session('message')}}
    @endif
    @if(count($productos)>0)
    <div class="row mt-3">
        <table class="table">
            <thead>
              <tr class="text-center">
                <th scope="col">Código</th>
                <th scope="col">Descripción</th>
                <th scope="col">Precio</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Estatus</th>
                <th scope="col">Impuesto</th>
                <th scope="col">Opciones</th>
              </tr>
            </thead>
            <tbody>
             @foreach ($productos as $producto)
                 <tr class="text-center">
                    <td>{{$producto->codigo}}</td>
                    <td>{{$producto->descripcion}}</td>
                    <td>{{$producto->precio}}</td>
                    <td>{{$producto->cantidad}}</td>
                    <td>{{($producto->estatus == 'A') ? 'Disponible' : 'Agotado'}}</td>
                    <td>{{$producto->impuesto*100}}%</td>
                    <th class="d-flex justify-content-around align-items-center align-content-center">
                        <a href="{{route('productos.editar',['producto'=>$producto->id])}}" class="btn btn-dark">Editar</a>
                        <form action="{{route('productos.delete',['producto'=>$producto->id])}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                 </tr>
             @endforeach
            </tbody>
        </table>
          {{$productos->links()}}
    </div>
    @else
        <h3 class="text-center mt-5">No hay productos cargados</h3>
    @endif
@endsection
