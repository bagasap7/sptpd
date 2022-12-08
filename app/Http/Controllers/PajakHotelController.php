<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PajakHotelController extends Controller
{
    public function index()
    {
        return view('dashboard.pajak_hotel.index');

    }
}
