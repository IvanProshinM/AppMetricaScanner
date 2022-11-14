<?php

namespace app\services;

use GuzzleHttp;


class AppticaService
{

    public function getData($date)
    {


        $client = new GuzzleHttp\Client(['debug' => false]);
        try {
            $res = $client->request('GET', 'https://api.apptica.com/package/top_history/1421444/1?',
                ['query' => [
                    'date_from' => $date,
                    'date_to' => $date,
                    'B4NKGg' => 'fVN5Q9KVOlOHDx9mOsKPAQsFBlEhBOwguLkNEDTZvKzJzT3l',
                ]]
            );
            $result = $res->getBody()->getContents();
            return json_decode($result, true);

        } catch (GuzzleHttp\Exception\ClientException $e) {
            echo $e->getMessage(). "</br>";
        }
    }



}