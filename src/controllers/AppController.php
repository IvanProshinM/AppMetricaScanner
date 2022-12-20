<?php

namespace app\controllers;

use app\models\TopCategory;
use app\services\AppticaService;
use app\services\CategoryDateService;
use app\services\LogsService;
use yii\db\Exception;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\Response;

class AppController extends Controller
{
    /**
     * @var CategoryDateService $categoryDateService
     */
    private $categoryDateService;
    /**
     * @var AppticaService $appticaService
     */
    private $appticaService;


    /**
     * @var LogsService $logsService
     */
    private $logsService;


    const UnixMonth = 2629743;

    public function __construct($id,
        $module,
                                CategoryDateService $categoryDateService,
                                AppticaService $appticaService,
                                LogsService $logsService,
        $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->categoryDateService = $categoryDateService;
        $this->appticaService = $appticaService;
        $this->logsService = $logsService;
    }


    public function actionTopCategory($date)
    {
        $today = date('Y-m-d');

        $url = "http://app/top-category?date=" . $date;

        if (strtotime($today) - strtotime($date) >= AppController::UnixMonth) {
            return 'Вы ввели дату месячной давности, требуется ввести дату не позднее месяца.';
        }
        if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $date)) {
            return "Дата в неправильном формате: yyyy-mm-dd";

        }
        $result = "Введена дата на будущее.";
        if ($today === $date) {
            $result = $this->appticaService->getData($date, $url);
            $topCategory = $this->categoryDateService->getTop($result);
        } elseif ($today > $date) {
            $currentDate = $this->categoryDateService->findByDate($date);
            if (!$currentDate) {
                $result = $this->appticaService->getData($date, $url);
                $this->categoryDateService->saveData($result, $date);
            }
            $result = $this->appticaService->getData($date, $url);
            $topCategory = $this->categoryDateService->getTop($result);
        }
        \Yii::$app->response->format = Response::FORMAT_JSON;

        return [
            "status_code" => 200,
            "message" => "ok",
            "data" => $topCategory
        ];
    }


    public function actionBotCategory($date)
    {
        $url = "http://app/top-category?date=" . $date;

      $result = $this->appticaService->getDataLog($date, $url);

    }


}