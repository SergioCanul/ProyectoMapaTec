<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Edificio extends Model
{
    use HasFactory;
    public function Departamento()
    {
        //un edificio puede tener muchos departamentos
        return $this->hasMany(Departamento::class);
    }
}
