<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class productosController extends Controller
{
    public function listarProducto(Request $request)
    {
        return view("productos")->with("productos", Producto::all()->where("status", 1));
    }

    public function crearProducto(Request $request)
    {
        if ($request->id == 0) {
            $producto = new Producto();
        } else {
            $producto = Producto::all()->where("id", $request->id)->first();
        }

        $campos = $request->validate([
            "nombre" => ["required"],
            "precio" => ["required","numeric","min:1"],
            "stock" => ["required", "numeric","min:1"],
        ]);

        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->stock = $request->stock;
        $producto->save();
        return redirect("/dashboard");
    }

    public function editarProducto(Request $request)
    {
        $producto = Producto::all()->where("id", $request->id)->first();
        return view("productos")->with("productos", Producto::all())->with("producto", $producto);
    }

    public function eliminarProducto(Request $request)
    {
        $producto = Producto::all()->where("id", $request->id)->first();
        $producto->status = 0;
        $producto->save();
        return redirect("/dashboard");
    }
}
