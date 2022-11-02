<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class customerOnly extends Controller
{
    public function index()
    {
        return view('customer.test');
    }
}
