<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedores extends Model
{
    use HasFactory;

    public function region()
    {
        return $this->belongsTo(Regiones::class, 'id_region');
    }

    public function productos()
    {
        return $this->hasMany(Productos::class, 'id_proveedor');
    }
}
