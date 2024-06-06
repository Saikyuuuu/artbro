<?php

// app/Services/WiseService.php

namespace App\Services;

use GuzzleHttp\Client;

class WiseService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api.wise.com/v1/',
            'headers' => [
                'Authorization' => 'Bearer ' . config('wise.api_key'),
                'Content-Type' => 'application/json',
            ],
        ]);
    }

    public function createPayment($data)
    {
        // Logic to make POST request to create a payment
        // Example:
        // $response = $this->client->post('payments', [
        //     'json' => $data,
        // ]);

        // return json_decode($response->getBody()->getContents(), true);
    }

    public function getCheckoutUrl($amount, $currency)
    {
        $response = $this->client->post('checkout/create', [
            'json' => [
                'amount' => $amount,
                'currency' => $currency,
            ],
        ]);

        $data = json_decode($response->getBody(), true);

        return $data['checkout_url'];
    }

    // Other methods for retrieving payment details, handling callbacks, etc.
}
