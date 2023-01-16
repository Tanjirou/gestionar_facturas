<?php

namespace App\Http\Controllers;

use App\Models\DetalleFactura;
use App\Models\Factura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FacturaController extends Controller
{
    public function index()
    {
        $compras = DB::table('compras')
            ->join('users','users.id','=','compras.id_usuario')
            ->join('productos','productos.id','=','compras.id_producto')
            ->where('compras.estatus','=','A')
            ->select('compras.*','users.name', 'productos.descripcion')
            ->orderBy('compras.id_usuario')
            ->get();
        return view('facturas.index',compact('compras'));
    }

    public function store()
    {
        $compras = DB::table('compras')
            ->where('compras.estatus','=','A')
            ->select(DB::raw('id_usuario,sum(monto_producto + (monto_producto*monto_impuesto)) as monto, sum(monto_producto*monto_impuesto) as impuesto'))
            ->groupBy('id_usuario')
            ->get();
        foreach($compras as $compra)
        {
            $factura = Factura::create([
                'id_usuario' => $compra->id_usuario,
                'monto_total' =>$compra->monto,
                'impuesto_total' => $compra->impuesto
            ]);
            $detalle_compras =  DB::table('compras')
                ->where('compras.estatus','=','A')
                ->where('id_usuario','=', $factura->id_usuario)
                ->join('productos','productos.id','=','compras.id_producto')
                ->select('compras.*','productos.descripcion as producto')
                ->get();
            foreach($detalle_compras as $detalle_compra)
            {
                DetalleFactura::create([
                    'id_factura'=> $factura->id,
                    'producto' => $detalle_compra->producto,
                    'precio' => $detalle_compra->monto_producto,
                    'impuesto' => $detalle_compra->monto_impuesto*100
                ]);
            }
            DB::table('compras')
                ->where('id_usuario','=',$factura->id_usuario)
                ->where('compras.estatus','=','A')
                ->update(['compras.estatus' => 'P']);
        }
        return redirect()->route('facturas.index');
    }
    public function procesadas()
    {
        $facturas = DB::table('facturas')
            ->join('users','users.id','=','facturas.id_usuario')
            ->select('users.name','facturas.*')
            ->get();
        return view('facturas.procesadas', compact('facturas'));
    }
    public function detalleFactura(Factura $factura)
    {
        $detalle_facturas = DB::table('detalle_facturas')
        ->where('id_factura','=',$factura->id)
        ->get();
        return view('facturas.detalle', compact('detalle_facturas'));
    }
    public function facturasCliente()
    {
        $facturas = DB::table('facturas')
            ->where('id_usuario','=',auth()->user()->id)
            ->get();
        return view('facturas.facturas_cliente',compact('facturas'));
    }
}
