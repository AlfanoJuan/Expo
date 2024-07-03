<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;


class AFIstudents extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;


    //protected $fillable = [ //Pinkus muévele a esto
      //  'matricula',
      //  'asistencia'
    //];

}