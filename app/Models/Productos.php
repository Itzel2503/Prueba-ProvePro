<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;

    public function proveedor()
    {
        return $this->belongsTo(Proveedores::class, 'id_proveedor');
    }
}
