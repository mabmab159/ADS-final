<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class usuariosController extends Controller
{

    public function listarUsuarios()
    {
        return view("usuarios")->with("usuarios", User::all()->where("status", 1));
    }

    public function crearUsuario(Request $request)
    {
        /*Usuario nuevo 0
        Usuario anterior 1*/
        if ($request->id == 0) {
            $usuario = new User();
            $usuario->password = Hash::make($request->password);
            $usuarios = $request->validate([
                "nombre" => ["required"],
                "apellido" => ["required"],
                "usuario" => ["required", "unique:App\Models\user,usuario"],
                "password" => ["required"]
            ]);
        } else {
            $usuario = User::all()->where("id", $request->id)->first();
            if (!is_null($request->password)) {
                $usuario->password = Hash::make($request->password);
            }
            $usuarios = $request->validate([
                "nombre" => ["required"],
                "apellido" => ["required"],
            ]);
        }
        $usuario->nombre = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->cargo = $request->cargo;
        $usuario->usuario = $request->usuario;
        $usuario->save();
        return redirect("/dashboard");
    }

    public function editarUsuario(Request $request)
    {
        $usuario = User::all()->where("id", $request->id)->first();
        return view("/usuarios")->with("usuarios", User::all()->where("status",1))->with("usuario", $usuario);
    }

    public function eliminarUsuario(Request $request)
    {
        $usuario = User::all()->where("id", $request->id)->first();
        $usuario->status = 0;
        $usuario->save();
        return redirect("/dashboard");
    }
}
