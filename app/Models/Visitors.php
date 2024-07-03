<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitors extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_completo',
        'matricula',
        'genre'
    ];

    public function getFullName(){
        return strtoupper($this->nombre_completo);
    }
}
