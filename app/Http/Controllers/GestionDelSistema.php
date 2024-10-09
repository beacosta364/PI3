<?php



namespace App\Http\Controllers;
use App\Models\Producto; // Asegúrate de que esta línea esté presente
use Illuminate\Http\Request;

class GestionDelSistema extends Controller
{
    public function index()
    {
        // Obtener todos los productos con sus movimientos
        $productos = Producto::with('movimientos')->get();

        // Retornar la vista gestioninventarios junto con los productos y movimientos
        return view('GestionDelSistema.gestioninventarios', compact('productos'));
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
