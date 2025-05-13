<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConocenosController extends Controller
{
    public function index()
    {
    return view('conocenos');   
    }

    public function Home(){
        return view('home');
    }
}
