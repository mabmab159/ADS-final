<?php

namespace App\Http\Controllers;

use App\Models\Alquiler;
use App\Models\Habitacion;
use App\Models\Producto;
use App\Models\Ventas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class habitacionController extends Controller
{

    public function listarHabitacion()
    {
        return view("habitacion")->with("habitaciones", Habitacion::all()->where("status", 1));
    }

    public function formularioHabitacion($numero_habitacion)
    {
        $habitacion = Habitacion::all()->where("numero_habitacion", $numero_habitacion)->where("status", 1)->first();
        return view("formularioHabitacion")->with("habitacion", $habitacion)->with("productos", Producto::all());
    }

    public function alquilarHabitacion($numero_habitacion, Request $request)
    {
        $habitacion = Habitacion::all()->where("numero_habitacion", $numero_habitacion)->first();
        $habitacion->estado = 1;
        $habitacion->save();
        //Guardar el alquiler para el cuadre de caja
        $alquiler = new Alquiler();
        $alquiler->numero_habitacion = $request->numero_habitacion;
        $alquiler->cliente = $request->cliente;
        $alquiler->dni = $request->dni;
        $alquiler->precio = $request->precio;
        $alquiler->save();
        //Recorrer los diferentes productos y validar la venta
        $productos = Producto::all();
        foreach ($productos as $producto) {
            if (!is_null($request["producto" . $producto->id])) {
                $venta = new Ventas();
                $venta->id_venta = $alquiler->id;
                $venta->idproducto = $producto->id;
                $venta->nombre = $producto->nombre;
                $venta->cantidad = $request["producto" . $producto->id];
                $venta->cliente = $request->cliente;
                $venta->dni = $request->dni;
                $venta->precio = $request->precio * $request["producto" . $producto->id];
                //Reducir el stock del producto
                $producto->stock = $producto->stock - $request["producto" . $producto->id];
                $producto->save();
                $venta->save();
            }
        }
        return redirect("/dashboard");
    }

    public function devolverHabitacion($numero_habitacion)
    {
        $habitacion = Habitacion::all()->where("numero_habitacion", $numero_habitacion)->first();
        $habitacion->estado = 2;
        $habitacion->save();
        return redirect("/dashboard");
    }

    public function habilitarHabitacion($numero_habitacion)
    {
        $habitacion = Habitacion::all()->where("numero_habitacion", $numero_habitacion)->first();
        $habitacion->estado = 0;
        $habitacion->save();
        return redirect("/dashboard");
    }

    public function crearHabitacion(Request $request)
    {
        if ($request->id == 0) {
            $habitacion = new Habitacion();
            $control_habitacion = $request->validate([
                "numero_habitacion" => ["unique:App\Models\habitacion,numero_habitacion"],
                "piso" => ["required"],
                "precio" => ["required"],
            ]);
        } else {
            $habitacion = Habitacion::all()->where("id", $request->id)->first();
            $control_habitacion = $request->validate([
                "piso" => ["required"],
                "precio" => ["required"],
            ]);
        }
        $habitacion->numero_habitacion = $request->numero_habitacion;
        $habitacion->piso = $request->piso;
        $habitacion->precio = $request->precio;
        $habitacion->estado = 0;
        $habitacion->save();
        return redirect("/dashboard");
    }

    public function editarHabitacion(Request $request)
    {
        $habitacion = Habitacion::all()->where("id", $request->id)->first();
        return view("habitacion")->with("habitaciones", Habitacion::all())->with("habitacion", $habitacion);
    }

    public function eliminarHabitacion(Request $request)
    {
        $habitacion = Habitacion::all()->where("id", $request->id)->first();
        $habitacion->status = 0;
        $habitacion->save();
        return redirect("/dashboard");
    }
}
