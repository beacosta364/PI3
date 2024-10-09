<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{  
    use HasFactory;
    // Especifica el nombre de la tabla en la base de datos
    //protected $table = "productos";

    // Definir las columnas que se pueden asignar de forma masiva
    //protected $fillable = ["nombre", "descripcion", "precio", "cantidad", "categoria_id"];

    public function categoria(){
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }


    // Relación con el modelo MovimientoProducto
    public function movimientos()
    {
        return $this->hasMany(MovimientoProducto::class, 'producto_id');
    }

}