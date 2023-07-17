<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redis;

class AuthorsController extends Controller
{
    protected $url = 'https://candidate-testing.api.royal-apps.io/api/v2/';

    protected $headers;

    public function __construct()
    {

        $this->middleware(function ($request, $next) {
            // fetch session and use it in entire class with constructor
            $this->headers =  [
                'Authorization' => 'Bearer ' . session('credentials')->token_key,
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ];

            return $next($request);
            });

    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $authors = $this->all_authors();
        // dd($authors->items);

        return view('authors.index', [
            'user' => $request->user(),
            'authors' => $authors,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $author = $this->author($id);
        return view('authors.show', ['author' => $author]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->delete($id);
        return redirect()->route('authors.index');
    }

    // get all authors

    public function all_authors()
    {

        $url = $this->url . 'authors';
        $response = Http::withHeaders($this->headers)->get($url);

        return json_decode($response->body());
    }

    public function author($id)
    {
        $url = $this->url . 'authors/' . $id;
        $response = Http::withHeaders($this->headers)->get($url);

        return json_decode($response->body());
    }

    public function delete($id)
    {
        $url = $this->url . 'authors/' . $id;

        $response = Http::withHeaders($this->headers)->delete($url);

        return json_decode($response->body());
    }

}
