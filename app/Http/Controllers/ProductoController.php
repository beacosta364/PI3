<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\Categoria; 
use Illuminate\Support\Facades\DB;


class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Obtener todos los productos con su categoría
        $productos = Producto::orderBy('id','ASC')->paginate(10);

        // Retornar una vista con los productos
        return view('productos.index', compact('productos'));
        
    }

    // public function dashboard()
    // {
    //     $productosAgotados = Producto::where('cantidad', 0)
    //                         ->orWhere('cantidad', '<', DB::raw('min_stock'))
    //                         ->orderBy('cantidad', 'asc')
    //                         ->get();

    //     return view('dashboard', compact('productosAgotados'));
    // }


    public function agotados()
    {
        // Obtener productos agotados (cantidad == 0) o productos por agotarse (cantidad < min_stock)
        $productosAgotados = Producto::where('cantidad', 0)
                            ->orWhere('cantidad', '<', DB::raw('min_stock'))
                            ->orderBy('cantidad', 'asc')
                            ->get();


        // Retornar la vista con los productos agotados o por agotarse
        return view('productos.agotados', compact('productosAgotados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categorias=Categoria::orderBy('id','DESC')->select('categorias.id','categorias.nombre')->get();
        return view('productos.create',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
    // Validar los datos recibidos del formulario
    $request->validate([
        'nombre' => 'required|string|max:255',
        'descripcion' => 'nullable|string|max:1000',
        'cantidad' => 'required|integer|min:1',
        'min_stock' => 'nullable|integer|min:0',  // Cambiado 'precio' por 'MinStock'
        'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Hasta 2MB
        'categoria_id' => 'required|exists:categorias,id', // Verifica que la categoría exista
    ]);

    // Inicializar el nombre de la imagen
    $nombreImagen = null;

    // Manejar la subida de la imagen
    if ($request->hasFile('imagen')) {
        $imagen = $request->file('imagen');
        $nombreImagen = time() . '.' . $imagen->getClientOriginalExtension();
        $imagen->move(public_path('img'), $nombreImagen); // Mueve la imagen a la carpeta 'img'
    }

    // Crear y guardar el producto
    $producto = new Producto;
    $producto->nombre = $request->nombre;             // Almacena el nombre
    $producto->descripcion = $request->descripcion;   // Almacena la descripción
    $producto->cantidad = $request->cantidad;         // Almacena la cantidad
    $producto->min_stock = $request->min_stock;         // Almacena el stock mínimo
    $producto->imagen = $nombreImagen;                 // Asigna la imagen (si existe)
    $producto->categoria_id = $request->categoria_id; // Almacena la categoría
    $producto->usuario_id = auth()->id();              // Asigna el ID del usuario autenticado
    $producto->save();                                  // Guarda el producto en la base de datos

    // Redirigir a la vista de productos con un mensaje de éxito
    return redirect()->route('productos.index')->with('success', 'Producto creado con éxito.');
}

    



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    // public function show(Producto $producto)
    // {
    //     //
    // }

    public function show(Producto $producto)
{
    return view('productos.show', compact('producto'));
}

public function edit(Producto $producto)
{
    $categorias = Categoria::orderBy('id', 'DESC')->get();
    return view('productos.edit', compact('producto', 'categorias'));
}


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    // public function edit(Producto $producto)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */





    // public function update(Request $request, Producto $producto)
    // {
    //     //
    // }



    public function update(Request $request, $id)
{
    // Validación
    $request->validate([
        'nombre' => 'required|string|max:255',
        'descripcion' => 'nullable|string|max:1000',
        'cantidad' => 'required|integer|min:1',
        'min_stock' => 'nullable|integer|min:0',  // Cambiado 'precio' por 'MinStock'
        'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'categoria_id' => 'required|exists:categorias,id',
    ]);

    // Encontrar el producto
    $producto = Producto::findOrFail($id);

    // Procesar imagen
    if ($request->hasFile('imagen')) {
        // Verificar si el producto ya tiene una imagen guardada
        if ($producto->imagen && file_exists(public_path('img/' . $producto->imagen))) {
            // Eliminar la imagen vieja
            unlink(public_path('img/' . $producto->imagen));
        }

        // Subir la nueva imagen
        $imagen = $request->file('imagen');
        $nombreImagen = time() . '.' . $imagen->getClientOriginalExtension();
        $imagen->move(public_path('img'), $nombreImagen);
    } else {
        // Si no se sube una nueva imagen, mantener la imagen actual
        $nombreImagen = $producto->imagen;
    }

    // Actualizar los atributos del producto
    $producto->nombre = $request->nombre;
    $producto->descripcion = $request->descripcion;
    $producto->cantidad = $request->cantidad;
    $producto->min_stock = $request->min_stock;  // Actualizado con el nuevo campo
    $producto->imagen = $nombreImagen;
    $producto->categoria_id = $request->categoria_id;

    // Guardar cambios en la base de datos
    $producto->save();

    // Redirigir a la vista de productos con un mensaje de éxito
    return redirect()->route('productos.index')->with('success', 'Producto actualizado con éxito.');
}

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
    // Buscar el producto por ID
    $producto = Producto::findOrFail($id);

    // Eliminar la imagen asociada al producto
    if ($producto->imagen && file_exists(public_path('img/' . $producto->imagen))) {
        unlink(public_path('img/' . $producto->imagen));
    }

    // Eliminar el producto de la base de datos
    $producto->delete();

    // Redirigir a la vista de productos con un mensaje de éxito
    return redirect()->route('productos.index')->with('success', 'Producto eliminado con éxito.');
}

}

