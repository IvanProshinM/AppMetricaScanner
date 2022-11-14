<?php


namespace app\models;

use yii\base\Model;
use yii\db\ActiveRecord;

class TopCategory extends ActiveRecord
{


    public function rules()
    {
        return [
            [[ 'id', 'category', 'position'], 'integer'],
            [['date'], 'date', 'format' => 'php:Y-m-d']
        ];
    }

}


