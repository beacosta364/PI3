<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\User;
use App\Models\MovimientoProducto;

use DB;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $productosAgotados = Producto::where('cantidad', 0)
            ->orWhere('cantidad', '<', DB::raw('min_stock'))
            ->orderBy('cantidad', 'asc')
            ->get();
            

        // Contar el número de usuarios registrados
        $numeroUsuarios = User::count();

        // Contar el número de productos registrados
        $numeroProductos = Producto::count();

        //Contar el número de movimientos en el último mes
        $numeroMovimientos = MovimientoProducto::whereYear('created_at', date('Y')) // Año actual
            ->whereMonth('created_at', date('m')) // Mes actual
            ->count(); 

        // Obtener los 5 productos más usados en el último mes con la cantidad total retirada
        $productosMasUsados = MovimientoProducto::select('producto_id', DB::raw('SUM(cantidad) as total_cantidad'))
        ->where('tipo_movimiento', 'salida') // Asegúrate de que 'salida' representa el movimiento de salida
        ->whereYear('created_at', date('Y'))
        ->whereMonth('created_at', date('m'))
        ->groupBy('producto_id')
        ->orderBy('total_cantidad', 'desc')
        ->limit(5)
        ->get();

        $productosLabels = $productosMasUsados->map(function ($movimiento) {
            return Producto::find($movimiento->producto_id)->nombre;
        });
        $productosValores = $productosMasUsados->pluck('total_cantidad');

        return view('dashboard', compact('productosAgotados', 'numeroUsuarios', 'numeroProductos', 'numeroMovimientos', 'productosLabels', 'productosValores'));

            //return view('dashboard', compact('productosAgotados', 'numeroUsuarios', 'numeroProductos','numeroMovimientos', 'productosLabels', 'productosValores'));
    }
}
