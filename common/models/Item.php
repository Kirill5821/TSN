<?php
namespace common\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

class Item extends ActiveRecord
{
    public static function tableName()
    {
        return 'item';
    }
    
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
}