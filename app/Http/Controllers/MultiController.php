<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class MultiController extends Controller
{
    public function index(): View
    {
        return view('multi');
    }
}
