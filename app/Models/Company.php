<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    const PRODUCCION = 1;
    const INACTIVO = 2;
    const ACTIVO = 3;
}
