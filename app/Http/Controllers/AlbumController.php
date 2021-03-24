<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use function GuzzleHttp\Promise\all;

class AlbumController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $response = Http::withHeaders(['Basic' => env('MOAT_KEY')])->get('https://moat.ai/api/task/');
        $responseBody = array_map(function ($a) {return $a[0]['name'];}, json_decode($response->body(), true));

        $albums = Album::all();

        return view('albums')
            ->with(compact('albums'))
            ->with(compact('responseBody'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'artist' => 'required',
            'album' => 'required',
            'year' => 'required|digits:4|numeric|min:1900|max:2030',
        ]);

        Album::create($request->all());

        return redirect()->route('albums.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        $album->delete();

        return redirect()->route('albums.create');
    }
}
