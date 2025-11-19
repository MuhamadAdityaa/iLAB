<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ruangan;

class LoginController extends Controller
{
    public function index() {
        $ruangan = ruangan::all();
        // dd($ruangan);
        return view('login', compact('ruangan'));

    }
}
