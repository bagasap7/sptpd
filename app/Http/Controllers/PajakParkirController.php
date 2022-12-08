<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PajakParkirController extends Controller
{
    public function index(){
        return view('dashboard.pajak_parkir.index',[
      
        ]);
    }
}
