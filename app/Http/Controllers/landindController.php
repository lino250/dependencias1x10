<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class landindController extends Controller
{
    public function __invoke()
    {
        return view('layouts/landing');
    }
}
