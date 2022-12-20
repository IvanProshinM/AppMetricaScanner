<?php

namespace app\services;

use app\models\Logs;

class LogsService
{

    public function saveLog($url, $request, $response)
    {
        $model = new Logs();
        $model->url = $url;
        $model->request = $request;
        $model->response = $response;
        $model->save();
    }


}