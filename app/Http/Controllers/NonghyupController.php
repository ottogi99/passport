<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nonghyup;

class NonghyupController extends Controller
{
    public function index()
    {
        $nonghyups = Nonghyup::all();

        return response()->json([
            'nonghyups' => $nonghyups,
        ], 200);
    }
}
