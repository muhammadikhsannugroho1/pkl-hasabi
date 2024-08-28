<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log; // Pastikan Anda mengimpor Log

class HttpClientService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => env('API_BASE_URL', 'http://localhost:8000/'), // Pastikan URL di sini benar
            'timeout'  => 2.0,
        ]);
    }

    public function get($uri, $params = [])
    {
        $url = $this->client->getConfig('base_uri') . $uri;
        Log::info("Request URL: " . $url); // Log URL untuk debugging

        try {
            $response = $this->client->request('GET', $uri, [
                'query' => $params,
            ]);
            return json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            Log::error("cURL Error: " . $e->getMessage()); // Log error jika terjadi masalah
            throw $e;
        }
    }

    public function post($uri, $data = [])
    {
        $url = $this->client->getConfig('base_uri') . $uri;
        Log::info("Request URL: " . $url); // Log URL untuk debugging

        try {
            $response = $this->client->request('POST', $uri, [
                'json' => $data,
            ]);
            return json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            Log::error("cURL Error: " . $e->getMessage()); // Log error jika terjadi masalah
            throw $e;
        }
    }
}
