<?php

namespace app\commands;

use app\models\Proxy;
use yii\console\Controller;

class GenerateController extends Controller
{

    public function actionProxy()
    {

        for ($i = 1; $i < 10; $i++) {
            $proxy = "proxy";
            $model = new Proxy();
            $proxy .= $i;
            $model->proxy = $proxy;
            $model->used = null;
            $model->save();
        }

    }
}