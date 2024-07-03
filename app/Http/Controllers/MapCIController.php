<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\project;


class MapCIController extends Controller
{
    //
    public function index(){
        return view('MapCI');
    }
}
