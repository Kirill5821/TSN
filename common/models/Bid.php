<?php

namespace common\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

class Bid extends ActiveRecord {

    public static function tableName() {
        return 'bid';
    }

    public function behaviors() {
        return [
            TimestampBehavior::className(),
        ];
    }

}
