<?php

namespace app\models;

use yii\db\ActiveRecord;

class ProxyHistory extends ActiveRecord
{
    public function rules()
    {
        return [
            [['id','proxy_id', 'used_at'], "integer"],
        ];
    }


}