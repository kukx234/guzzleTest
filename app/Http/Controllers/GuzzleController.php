<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as GuzzleRequest;
use GuzzleHttp\Promise;
use GuzzleHttp\RequestOptions;

class GuzzleController extends Controller
{
    protected $x_auth_token ;

    public function tokenAuth()
    {
        
        $client = new Client([
            'base_uri' => 'https://api.productive.io/api/v2',
        ]);
        $request = new GuzzleRequest('GET', 'https://api.productive.io/api/v2/sessions', [
            'Content-Type' => 'application/vnd.api+json',
            'X-auth-token' => 'a8f9627f-ab48-4955-9ee2-509ba9478f50',
        ]);

        $response = $client->send($request);
        echo $response->getBody();
        //$json = json_decode($data);
        //$json_data = $json->data[0]->attributes->token;
    }

    public function signUpWithProductive()
    {
        $client = new Client([
            'base_uri' => 'https://api.productive.io/api/v2',
        ]);

        $response = $client->post('/api/v2/sessions',[
            'headers' => [
                'Content-Type' => 'application/vnd.api+json',
            ],
            'json' => [
                'data' => [
                   'type' => 'sessions',
                    'attributes' => [
                        'email' => 'tvornica.studenti@gmail.com',
                        'password' => 'tvornica456',
                    ]
                ]
            ]
            
        ]);

        echo $response->getBody();

        /*$request = new GuzzleRequest('POST', 'https://api.productive.io/api/v2/sessions', [
            'Content-Type' => 'application/vnd.api+json',
            'auth' => [
                'email' => 'tvornica.studenti@gmail.com',
                'password' => 'tvornica456',
            ],
        ]);
        $response = $client->send($request);
        echo $response->getBody(); */
      
    }
}
