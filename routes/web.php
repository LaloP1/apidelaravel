<?php

use Illuminate\Support\Facades\Route;

use GuzzleHttp\Client; 

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', function (){
    $publicKey = 'd4acbd838efa99f58cbd4de86f52be02';
    $privateKey = '65eaf1e8d31e112a0af909bda924ff83bec0a9c6';
    $timestamp = time();
    $hash = md5($timestamp . $privateKey . $publicKey);
    $limit = 7; // Cantidad de cómics por página

    // Obtiene el número de página actual de la solicitud
    $page = request()->input('page', 1);

    $client = new Client();

    $response = $client->get("https://gateway.marvel.com/v1/public/comics", [
        'query' => [
            'ts' => $timestamp,
            'apikey' => $publicKey,
            'hash' => $hash,
            'offset' => ($page - 1) * $limit, // Calcula el desplazamiento para la página actual
        ],
    ]);
    
    $data = json_decode($response->getBody());
    
    $comics = $data->data->results;
    // dd($data);

    foreach ($comics as $comic) {
        $comic->image_url = $comic->thumbnail->path . '/portrait_uncanny.' . $comic->thumbnail->extension;
    }
    $comics = collect($comics);
    return view('apiMarvel.marvel', ['comics' => $comics, 'page' => $page]);
    
})->name('apiMarvel.marvel');


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
