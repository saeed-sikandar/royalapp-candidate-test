<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BookController extends Controller
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
    public function index()
    {
        //
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
        //
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

        return redirect()->back();
    }


    public function delete($id)
    {
        $url = $this->url . 'books/' . $id;

        $response = Http::withHeaders($this->headers)->delete($url);

        return json_decode($response->body());
    }

}
