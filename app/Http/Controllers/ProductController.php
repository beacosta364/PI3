<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ProductController extends Controller 
{

    public function index()
    {
        return view('productos.gestioninventarios');
    }
    public function agregar()
    {
        return view('productos.gestionusuarios');
    }
    public function acceso()
    {
        return view('productos.controlacceso');
    }
    public function alarma()
    {
        return view('productos.alarma');
    }
}