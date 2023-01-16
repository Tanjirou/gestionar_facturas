<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompraController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $compras = DB::table('compras')
            ->join('productos','productos.id','=','compras.id_producto')
            ->where('compras.id_usuario','=', auth()->user()->id)
            ->select('productos.descripcion', 'compras.monto_producto','compras.monto_impuesto','compras.estatus')
            ->orderByDesc('compras.id')->get();
        return view('compras.index')->with('compras',$compras);
    }
    public function create()
    {
        $productos =DB::table('productos')->where('estatus','=','A')->get();
        return view('compras.create')->with('productos',$productos);
    }

    public function store(Request $request)
    {
        Compra::create([
            'id_producto' => $request['id_producto'],
            'id_usuario' => auth()->user()->id,
            'cantidad' => 1,
            'monto_producto' => $request['precio'],
            'monto_impuesto' => $request['impuesto'],
            'estatus' => 'A'
        ]);
        return redirect()->route('compras.create')->with('message','Compra realizada con exito');
    }
}
