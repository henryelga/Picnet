<?php
namespace App\Services;

use GuzzleHttp\Client;

class ProfanityChecker
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'headers' => [
                'X-RapidAPI-Host' => 'neutrinoapi-bad-word-filter.p.rapidapi.com',
                'X-RapidAPI-Key' => '3df6feeb79mshd8b36d9595f9396p10f4f4jsnc42486578bab',
                'Content-Type' => 'application/x-www-form-urlencoded',
            ]
        ]);
    }

    public function checkProfanity($content)
    {
        try {
            $response = $this->client->request('POST', 'https://neutrinoapi-bad-word-filter.p.rapidapi.com/bad-word-filter', [
                'form_params' => [
                    'content' => $content,
                    'censor-character' => '*'
                ]
            ]);

            return json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}