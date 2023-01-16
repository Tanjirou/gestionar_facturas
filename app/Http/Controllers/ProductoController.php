<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = DB::table('productos')
            ->orderByDesc('id')
            ->simplePaginate(15);
        return view('productos.index')->with('productos',$productos);
    }

    public function register()
    {
        return view('productos.register');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'codigo' => ['required', 'min:4'],
            'descripcion' => ['required', 'min:4'],
            'precio' => ['required'],
            'cantidad' => ['required', 'numeric'],
            'impuesto' => ['required']
        ]);

        Producto::create([
            'codigo'=> $data['codigo'],
            'descripcion'=> $data['descripcion'],
            'precio' => $data['precio'],
            'cantidad' => $data['cantidad'],
            'estatus' => 'A',
            'impuesto'=> $data['impuesto']
        ]);

        return redirect()->route('productos.index')->with('message','Producto registrado correctamente');
    }

    public function editar(Producto $producto)
    {
        return view('productos.editar')->with('producto',$producto);
    }
    public function editarStore(Request $request)
    {
        $data = $request->validate([
            'codigo' => ['required', 'min:4'],
            'descripcion' => ['required', 'min:4'],
            'precio' => ['required'],
            'cantidad' => ['required', 'numeric'],
            'impuesto' => ['required']

        ]);
        DB::table('productos')->where('id', '=', $request['id_producto'])->update([
            'codigo'=>$data['codigo'],
            'descripcion'=>$data['descripcion'],
            'precio' =>$data['precio'],
            'cantidad' => $data['cantidad'],
            'estatus' => ($data['cantidad']==0) ? 'E' : 'A',
            'impuesto'=> $data['impuesto']
        ]);
        return redirect()->route('productos.index')->with('message','Producto actualizado correctamente');
    }
    public function delete(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index')->with('message','Producto eliminado correctamente');
    }
}
