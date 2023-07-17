<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

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
        $authors = $this->all_authors();
        return view('books.create', ['authors' => $authors]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'title' => 'required|string',
            'author' => 'required|string',
            'description' => 'required|string',
            'number_of_pages' => 'required|string',
            'isbn' => 'required|string',
            'format' => 'required|string',
            'release_date' => 'required|date',
        ]);

        if($validate->errors()->any()){
            return redirect()->back()->withErrors($validate->errors());
        }

        $book = array(
            'title' => $request->title,
            'author' => ['id' => (int) $request->author],
            'description' => $request->description,
            'number_of_pages' => (int) $request->number_of_pages,
            'isbn' => $request->isbn,
            'format' => $request->format,
            'release_date' => $request->release_date,
        );
         $this->create_book($book);
         return redirect()->route('authors.show', [$request->author])->with('success', 'Book created successfully');
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

   // Apis

    public function create_book(array $data)
    {
        $url = $this->url . 'books';

        $response = Http::withHeaders($this->headers)->post($url, $data);

        return json_decode($response->body());
    }
    public function delete($id)
    {
        $url = $this->url . 'books/' . $id;

        $response = Http::withHeaders($this->headers)->delete($url);

        return json_decode($response->body());
    }


    public function all_authors()
    {

        $url = $this->url . 'authors';
        $response = Http::withHeaders($this->headers)->get($url);

        return json_decode($response->body());
    }



}
