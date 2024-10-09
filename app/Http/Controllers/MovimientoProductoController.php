<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\MovimientoProducto;
use Illuminate\Http\Request;

class MovimientoProductoController extends Controller
{
    public function index()
    {
        // Obtener todos los movimientos con sus productos y usuarios
        $movimientos = MovimientoProducto::with(['producto', 'usuario'])->get();
        
        // Retornar la vista con los movimientos
        return view('movimientos.index', compact('movimientos'));
    }

    public function create($producto_id)
    {
        // método para formulario para un producto
        $producto = Producto::findOrFail($producto_id);
        return view('movimientos.create', compact('producto'));
    }

    public function store(Request $request)
{
    // Validar la solicitud
    $request->validate([
        'producto_id' => 'required|exists:productos,id',
        'cantidad' => 'required|integer|min:1',
        'tipo_movimiento' => 'required|in:ingreso,salida',
        'descripcion' => 'nullable|string',
    ]);

    // Buscar el producto
    $producto = Producto::findOrFail($request->producto_id);
    $cantidad = $request->cantidad;

    // Comprobar si hay suficiente cantidad para una extracción
    if ($request->tipo_movimiento == 'salida' && $producto->cantidad < $cantidad) {
        return back()->with('error', 'Cantidad insuficiente en inventario.');
    }

    // Registrar el movimiento
    MovimientoProducto::create([
        'producto_id' => $producto->id,
        'usuario_id' => auth()->id(), // Obtener el ID del usuario logueado
        'cantidad' => $cantidad,
        'tipo_movimiento' => $request->tipo_movimiento,
        'descripcion' => $request->descripcion,
    ]);

    // Definir un array de operaciones
    $operaciones = [ 
        'salida' => 'decrement',
        'ingreso' => 'increment',
    ];

    // Ejecutar la operación correspondiente
    $producto->{$operaciones[$request->tipo_movimiento]}('cantidad', $cantidad);

    // Redirigir con un mensaje de éxito
    return redirect()->route('gestioninventarios')->with('success', 'Movimiento registrado con éxito.');
}
}
