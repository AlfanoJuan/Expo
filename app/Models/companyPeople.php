<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\company;

class companyPeople extends Model
{
    use HasFactory, SoftDeletes;

    public function company(){
        return $this->belongsTo(company::class, 'company', 'id');
    }
}
