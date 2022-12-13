<?php

namespace App\Http\Controllers;

use App\Models\Habitacion;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function mostrarDashboard()
    {
        return view("dashboard")->with("habitaciones", Habitacion::all()->where("status", 1)->sortBy("numero_habitacion"));
    }
}
