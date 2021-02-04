<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nonghyup;

class NonghyupController extends Controller
{
    public function index(Request $request)
    {
        // if (!empty($request->get('start_date'))) {
        //     $start_date = Carbon::createFromFormat('Y-m-d H:i:s', $request->get('start_date'));
        // } else {
        //     $start_date = Carbon::now();
        // }

        // if (!empty($request->get('end_date'))) {
        //     $start_date = Carbon::createFromFormat('Y-m-d H:i:s', $request->get('end_date'));
        // } else {
        //     $end_date = $start_date->copy()->addMonths(1);
        // }

        // $posts = Post::whereBetween('created_at', [
        //     $start_date->startOfDay(),
        //     $end_date->endOfDay()
        // ])->orderBy('created_at', 'desc')->get();
        
        $nonghyups = Nonghyup::all();

        return response()->json([
            'nonghyups' => $nonghyups,
        ], 201);
    }
}
