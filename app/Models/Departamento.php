<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;
    public function Edificio()
    {
        //muchos departamentos pueden pertenecer a un edificio
        return $this->belongsTo(Edificio::class);
    }
}
