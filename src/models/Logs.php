<?php

namespace app\models;

use yii\db\ActiveRecord;

class Logs extends ActiveRecord
{

    /**
     * @property string request
     * @property string response
     * @property string url
     */

    public function rules()
    {
        return [
            [['request', 'response', 'url'], 'string']
        ];
    }


}