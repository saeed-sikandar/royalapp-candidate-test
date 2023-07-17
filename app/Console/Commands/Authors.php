<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class Authors extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'author:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'To Create Author in API A authors collection.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Authenticating server...');
        $url = 'https://candidate-testing.api.royal-apps.io/api/v2/token';
        $user = auth()->user();

        $response = Http::post($url, [
            'email' => 'ahsoka.tano@royal-apps.io',
            'password' =>  'Kryze4President',
        ], [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ]);
        $data = json_decode($response->body());
        $this->info('Creating Author...');

        $url = 'https://candidate-testing.api.royal-apps.io/api/v2/authors';
        $headers = [
            'Authorization' => 'Bearer ' . $data->token_key,
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];
        $author = [
            "first_name" => "Test ",
            "last_name" => "Author",
            "birthday" => \Carbon\Carbon::now(),
            "biography" => "Test Biography",
            "gender" => "male",
            "place_of_birth" => "Test Place of Birth"
        ];
        $response = Http::withHeaders($headers)->post($url, $author);
        $this->info('Please wait...');

        $res_body = json_decode($response->body());

        // dd($res_body);
        $this->info( 'Author ID: '.$res_body->id . ' Author Name: ' . $res_body->first_name . ' ' . $res_body->last_name);
        $this->info('Author Created Successfully');
        // $this->table(['id','first_name', 'last_name', 'birthday', 'biography' , 'gender' , 'place_of_birth'], $res_body);

    }
}
