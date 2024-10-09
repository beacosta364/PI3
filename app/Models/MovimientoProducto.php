<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovimientoProducto extends Model
{
    use HasFactory;

    protected $table = 'movimientos_productos';

    protected $fillable = [
        'producto_id',
        'usuario_id',
        'cantidad',
        'tipo_movimiento',
        'descripcion',
    ];

    // public function producto()
    // {
    //     return $this->belongsTo(Producto::class, 'producto_id');
    // }

    // public function usuario()
    // {
    //     return $this->belongsTo(User::class, 'usuario_id');
    // }

    // Relación con el producto
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    // Relación con el usuario
    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}
