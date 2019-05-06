<?php

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*Route::get('/productive',function(){
    $client = new Client([
        // Base URI is used with relative requests
        'base_uri' => 'https://api.productive.io/api/v2',
    ]);
    $request = new Request('GET', 'https://api.productive.io/api/v2/sessions', [
            'Content-Type' => 'application/vnd.api+json',
            'X-auth-token' => '2a35f3f2-caeb-448e-bcc7-cef810c9711f',
    ]);
    $response = $client->send($request);
    $data = $response->getBody();

    $json = json_decode($data);

    foreach ($json as  $att) {
        dd($att[1]);
        echo $att[0]->attributes->token;
    } 

//dd($json);

});
*/

Route::get('/tokenauth', 'GuzzleController@tokenAuth');

Route::get('/signUpWithProductive', 'GuzzleController@signUpWithProductive');