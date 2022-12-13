<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Ventas;
use Illuminate\Http\Request;

class ventasController extends Controller
{
    public function ventas(Request $request)
    {
        return view("ventas")->with("productos", Producto::all());
    }

    public function realizarVenta(Request $request)
    {
        //Recorrer los diferentes productos y validar la venta
        $productos = Producto::all();
        $cantidad = Ventas::max("id_venta");
        foreach ($productos as $producto) {
            if (!is_null($request["producto" . $producto->id])) {
                $venta = new Ventas();
                $venta->id_venta = $cantidad + 1;
                $venta->idproducto = $producto->id;
                $venta->nombre = $producto->nombre;
                $venta->precio = $producto->precio * $request["producto" . $producto->id];
                $venta->cantidad = $request["producto" . $producto->id];
                $venta->cliente = $request->cliente;
                $venta->dni = $request->dni;
                //Reducir el stock del producto
                $producto->stock = $producto->stock - $request["producto" . $producto->id];
                $producto->save();
                $venta->save();
            }
        }
        return redirect("/ventas");
    }
}
