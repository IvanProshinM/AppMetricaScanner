<?php

namespace app\services;

use GuzzleHttp;
use yii\helpers\VarDumper;

class ApiRequestService
{





    public function getToken($client_id, $client_secret)
    {
        $client = new GuzzleHttp\Client();

        $res = $client->request('POST', 'https://performance.ozon.ru/api/client/token',
            [
                'json' => [
                    "client_id" => "3227119-1671004616898@advertising.performance.ozon.ru",
                    "client_secret" => "IiwfrZ3YUSjeSV_HDGziCC5k2LX1ioPsAy73b_4jwP_oJU4oLe-ZJkdmgDaHn9D4KL4M6PzlGhFO3KUlpA",
                    "grant_type" => "client_credentials"
                ]
            ]
        );

        $response = $res->getBody()->getContents();

        $token = json_decode($response, true);

        return $token['access_token'];
    }

    public function getCampaignList($access_token)
    {
        $client = new GuzzleHttp\Client();

        $token = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJhdWQiOiJhZHZlcnRpc2luZy5wZXJmb3JtYW5jZS5vem9uLnJ1IiwiZXhwIjoxNjcxNTcyMjMwLCJpYXQiOjE2NzE1NzA0MzAsImlzcyI6InBlcmZvcm1hbmNlLWF1dGgub3pvbi5ydSIsInN1YiI6IjMyMjcxMTktMTY3MTAwNDYxNjg5OEBhZHZlcnRpc2luZy5wZXJmb3JtYW5jZS5vem9uLnJ1In0.qUzzL6Ev9QTt2KKQ7vB9wLP2VdTBWGy87YiCU1gXHxw";


        $headers = [
            'Content-Type' => 'application/json',
            'Accept'=> 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ];

        $res = $client->request('GET', 'https://performance.ozon.ru:443/api/client/campaign',
            [
                'headers' => $headers
            ]
        );

        $response = json_decode($res->getBody()->getContents());

        VarDumper::dump($response,3,true);
    }
}