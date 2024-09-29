<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GestionDelSistema extends Controller
{
    public function index()
    {
        return view('GestionDelSistema.gestioninventarios');
    }
    public function agregar()
    {
        return view('GestionDelSistema.gestionusuarios');
    }
    public function acceso()
    {
        return view('GestionDelSistema.controlacceso');
    }
    public function alarma()
    {
        return view('GestionDelSistema.alarma');
    }
}