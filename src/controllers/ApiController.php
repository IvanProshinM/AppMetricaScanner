<?php

namespace app\controllers;

use yii\helpers\VarDumper;
use yii\web\Controller;
use GuzzleHttp;

class ApiController extends Controller
{

    public function actionGetCampaignList()
    {
        $client = new GuzzleHttp\Client();

        $token = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJhdWQiOiJhZHZlcnRpc2luZy5wZXJmb3JtYW5jZS5vem9uLnJ1IiwiZXhwIjoxNjcxNTcyMjMwLCJpYXQiOjE2NzE1NzA0MzAsImlzcyI6InBlcmZvcm1hbmNlLWF1dGgub3pvbi5ydSIsInN1YiI6IjMyMjcxMTktMTY3MTAwNDYxNjg5OEBhZHZlcnRpc2luZy5wZXJmb3JtYW5jZS5vem9uLnJ1In0.qUzzL6Ev9QTt2KKQ7vB9wLP2VdTBWGy87YiCU1gXHxw";


        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ];

        $res = $client->request('GET', 'https://performance.ozon.ru:443/api/client/campaign',
            [
                'headers' => $headers
            ]
        );

        $response = json_decode($res->getBody()->getContents());

        VarDumper::dump($response, 3, true);
    }

}