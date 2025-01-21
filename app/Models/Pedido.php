<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = ['producto', 'cantidad', 'total', 'usuario_id'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
