<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class validation_tokens extends Model
{
    use HasFactory, SoftDeletes;

    public function teacher()
    {
        //de la tabla propia - de la otra tabla PK
        return $this->belongsTo(teacher::class, 'teachers', 'id');
    }
}