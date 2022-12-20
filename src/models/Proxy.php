<?php

namespace app\models;

use yii\db\ActiveRecord;

class Proxy extends ActiveRecord
{
    public function rules()
    {
      return [
        [['id', 'used'], "integer"],
          ['proxy', 'string']
      ];
    }


}