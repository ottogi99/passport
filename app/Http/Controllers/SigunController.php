<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sigun;

class SigunController extends Controller
{
    public function index()
    {
        $siguns = Sigun::all();

        return response()->json([
            'siguns' => $siguns
        ], 200);
    }

    public function store()
    {
        return response()->json([
            'hello'=>'world'
        ], 201);
    }
}
