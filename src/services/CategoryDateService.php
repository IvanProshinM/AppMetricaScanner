<?php

namespace app\services;

use app\models\TopCategory;
use yii\helpers\VarDumper;

class CategoryDateService
{

    public function findByDate($date)
    {
        $data = TopCategory::find()
            ->where(['date' => $date])
            ->all();
        $result = [];
        foreach ($data as $item) {
            $result[] = [$item->category => $item->position];
        }
        return $result;
    }


    public function saveData($result, $date)
    {

        $topCategory = $this->getTop($result);
        foreach ($topCategory as $key => $top) {
            $model = new TopCategory();
            $model->category = $key;
            $model->position = $top;
            $model->date = $date;
            $model->save();
        }

    }

    public function getTop($result)
    {
        $positionArray = [];
        foreach ($result['data'] as $category => $data) {
            foreach ($data as $key => $item) {
                foreach ($item as $date => $position) {
                    $positionArray[$category][] = $position;
                }
            }
        }
        $topPositionArray = [];
        foreach ($positionArray as $category => $subcategory) {
            $topPositionArray[$category] = min($subcategory);
        }
        return $topPositionArray;
    }

}