<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ArtistController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $response = Http::withHeaders(['Basic' => env('MOAT_KEY')])->get('https://moat.ai/api/task/');
        $responseBody = json_decode($response->body(), true);
        
        return view('artists', ['data' => $responseBody ]);
    }
}
