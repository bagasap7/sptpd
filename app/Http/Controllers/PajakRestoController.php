<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PajakRestoController extends Controller
{
    public function index(){
        return view('dashboard.pajak_resto.index',[
      
        ]);
    }
}
