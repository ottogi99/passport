<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sigun;

class SigunController extends Controller
{
    public function index()
    {
        $siguns = Sigun::all();

        // $siguns = array(
        //     "id" => 1,
        //     "seq" => 1,
        //     "code" => "ca",
        //     "name" => "천안시",
        //     "created_at" => "2021-01-21 13:42:00"
        // );

        return response()->json([
            'siguns' => $siguns
        ], 200);
    }
}
