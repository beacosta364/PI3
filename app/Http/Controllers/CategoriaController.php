<?php
//controlador de tipo resorce
namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
         $categorias=Categoria::orderBy('id','ASC')->paginate(1001);
        return view('categorias.index', compact('categorias'));

        // jeison de la tabla categorias
        //return["categorias"=>$categorias];
       
    }


    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required|max:255',
        'descripcion' => 'nullable|max:500',
        'status' => 'required|boolean',
    ]);

    Categoria::create($request->all());

    return redirect()->route('categorias.index');
}



    // public function show(Categoria $categoria)
    // {
    //     return view('categorias.show', compact('categoria'));
    // }
    public function show($id)
{
    $categoria = Categoria::findOrFail($id);
    return view('categorias.show', compact('categoria'));
}

    // public function edit(Categoria $categoria)
    // {
    //     return view('categorias.edit', compact('categoria'));
    // }

    public function edit($id)
{
    $categoria = Categoria::findOrFail($id);
    return view('categorias.edit', compact('categoria'));
}


    // public function update(Request $request, Categoria $categoria)
    // {
    //     $request->validate([
    //         'nombre' => 'required|unique:categorias,nombre,' . $categoria->id . '|max:100',
    //         'descripcion' => 'nullable',
    //     ]);

    //     $categoria->update($request->all());
    //     return redirect()->route('categorias.index')->with('success', 'Categoría actualizada con éxito.');
    // }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'descripcion' => 'nullable|max:500',
            'status' => 'required|boolean',
        ]);
    
        $categoria = Categoria::findOrFail($id);
        $categoria->update($request->all());
    
        return redirect()->route('categorias.index')->with('success', 'Categoría actualizada con éxito.');
    }
    

    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('categorias.index')->with('success', 'Categoría eliminada con éxito.');
    }

}


