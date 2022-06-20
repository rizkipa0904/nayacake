<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BerandaController;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        return view ('beranda');
    }

    public function about()
    {
        return view ('tentang');
    }
}
