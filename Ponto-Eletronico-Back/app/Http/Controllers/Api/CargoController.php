<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cargo;

class CargoController extends Controller
{
    public function index() {
        return Cargo::get(['id','nome']);
    }
    
}
