<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\event;
use App\Models\company;

class IndexController extends Controller
{
    //
    public function index(){
        return view('lmadindex');
    }
}
