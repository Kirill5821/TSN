<?php

namespace common\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use common\models\Item;

class Auction extends ActiveRecord {

    public static function tableName() {
        return 'auction';
    }

    public function behaviors() {
        return [
            TimestampBehavior::className(),
        ];
    }

    public function getName() {
        $item3 = Item::find()->where(['id' => $this->id_item])->asArray()->one();
        return $item3->name;
    }

}
