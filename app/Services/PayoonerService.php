<?php

namespace App\Services;

use GuzzleHttp\Client;

class PayoneerService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api.payoneer.com/',
        ]);
    }

    public function initiatePayment($data)
    {
        // Make HTTP request to Payoneer API to initiate payment
        // Example:
        // $response = $this->client->post('payments', [
        //     'json' => $data,
        // ]);
        // return json_decode($response->getBody(), true);
    }

    public function checkPaymentStatus($paymentId)
    {
        // Make HTTP request to Payoneer API to check payment status
        // Example:
        // $response = $this->client->get("payments/{$paymentId}");
        // return json_decode($response->getBody(), true);
    }
}
