<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GuzzleHttp\Client;

class InicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $comicId = request()->input('comic_id');

        if ($comicId) {
            return $this->show($comicId);
        }

        $publicKey = 'd4acbd838efa99f58cbd4de86f52be02';
        $privateKey = '65eaf1e8d31e112a0af909bda924ff83bec0a9c6';
        $timestamp = time();
        // Calcula el hash necesario para la autenticación utilizando md5 con el timestamp y las claves.
        $hash = md5($timestamp . $privateKey . $publicKey);
        $limit = 5; // Cantidad de cómics por página

        // Obtiene el número de página actual de la solicitud
        $page = request()->input('page', 1);

        // Crea una instancia del cliente HTTP Guzzle.
        $client = new Client();

        // Realiza una solicitud GET a la API de Marvel para obtener cómics.
        $response = $client->get("https://gateway.marvel.com/v1/public/comics", [
            'query' => [
                'ts' => $timestamp,
                'apikey' => $publicKey,
                'hash' => $hash,
                'offset' => ($page-1)* $limit, // Calcula el desplazamiento para la página actual
            ],
        ]);

        // Decodifica la respuesta JSON obtenida de la API de Marvel.
        $data = json_decode($response->getBody());

        // Extrae la lista de cómics de los resultados de la respuesta.
        $comics = $data->data->results;
        //  dd($data);

        // Modifica cada cómic para agregar la URL completa de la imagen.
        foreach ($comics as $marvel) {
            $marvel->image_url = $marvel->thumbnail->path . '/portrait_uncanny.' . $marvel->thumbnail->extension;
        }

        $comics = collect($comics);
        return view('apiMarvel.marvel', ['comics' => $comics, 'page' => $page]);
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
            $publicKey = 'd4acbd838efa99f58cbd4de86f52be02';
            $privateKey = '65eaf1e8d31e112a0af909bda924ff83bec0a9c6';
            $timestamp = time();
            $hash = md5($timestamp . $privateKey . $publicKey);

            $client = new Client();

            $response = $client->get("https://gateway.marvel.com/v1/public/comics/{$id}", [
                'query' => [
                    'ts' => $timestamp,
                    'apikey' => $publicKey,
                    'hash' => $hash,
                ],
            ]);

            $data = json_decode($response->getBody());
            $comic = $data->data->results[0];

            return view('apiMarvel.detailscomics', ['comic' => $comic]);

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
        //
    }
}
