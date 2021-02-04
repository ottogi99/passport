<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Nonghyup;

class NonghyupController extends Controller
{
    public function index(Request $request)
    {
        $query = Nonghyup::join('siguns', 'nonghyups.sigun', 'siguns.code')
                            ->select('nonghyups.*')
                            ->orderby('siguns.seq')
                            ->orderBy('seq');

        // if ($request->get('year')) {
        //     $query->where('year', $request->get('year'));
        // }

        if ($request->get('sigun')) {
            $query->where('nonghyups.sigun', $request->get('sigun'));
        }

        if ($request->get('nonghyup')) {
            $query->where('nonghyups.code', $request->get('nonghyup'));
        }

        if ($request->get('q')) {
            $query->where('nonghyups.name', $request->get('q'));
        }


        // $posts = Post::whereBetween('created_at', [
        //     $start_date->startOfDay(),
        //     $end_date->endOfDay()
        // ])->orderBy('created_at', 'desc')->get();

        // $nonghyups = Nonghyup::all();
        // return response()->json([
        //     'nonghyups' => $nonghyups,
        // ], 201);

        $nonghyups = $query->get();

        // Log::debug($nonghyups);

        return response()->json([
            'nonghyups' => $nonghyups,
        ], 201);

    }
}
