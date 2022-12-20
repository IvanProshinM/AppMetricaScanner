<?php

namespace app\services;

use app\models\Proxy;
use app\models\ProxyHistory;
use GuzzleHttp;
use yii\db\Query;
use yii\helpers\VarDumper;

use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\MessageFormatter;
use Monolog\Logger;


class Monologer
{


    const unixMin = 60;


    /**
     * @var LogsService $logsService
     */
    private $logsService;


    public function __construct(LogsService $logsService)
    {

        $this->logsService = $logsService;


    }


    public function getData($date, $url)
    {



        $stack = HandlerStack::create();
        Middleware::log(
            new Logger('Logger'),
            new MessageFormatter('{req_body} - {res_body}')
        );




        $unix = time() - 60;

        $request = $this->getRequest($date);

        $matches = Proxy::find()
            ->select(['proxy.proxy', 'proxy.id', 'COUNT(proxy_history.proxy_id)'])
            ->innerJoin('proxy_history', ' proxy_history.proxy_id =proxy.id')
            ->where(['<', 'proxy_history.used_at', $unix])
            ->groupBy(['proxy.proxy', 'proxy.id'])
            ->having(('count(proxy_history.proxy_id' < 5) or 'proxy_history.proxy_id = null')
            ->all();

        $proxy = ($matches[rand(1, count($matches)) - 1]);


        $client = new GuzzleHttp\Client(['debug' => false]);
        try {

            $res = $client->request('GET', 'https://api.apptica.com/package/top_history/1421444/1?',
                ['query' => [
                    'date_from' => $date,
                    'date_to' => $date,
                    'B4NKGg' => 'fVN5Q9KVOlOHDx9mOsKPAQsFBlEhBOwguLkNEDTZvKzJzT3l',
                ],
                    'handler'=>$stack
                    /*'proxy' => $proxy->attributes['proxy']*/
                ]
            );
            $result = $res->getBody()->getContents();

            $this->logsService->saveLog($url, $request, $result );

            return json_decode($result, true);

        } catch (GuzzleHttp\Exception\ClientException $e) {
            echo $e->getMessage() . "</br>";
        }
    }


    public function getRequest($date)
    {
        return "https://api.apptica.com/package/top_history/1421444/1?date_from" . $date . "date_to" . $date . "B4NKGg = fVN5Q9KVOlOHDx9mOsKPAQsFBlEhBOwguLkNEDTZvKzJzT3l";
    }


}