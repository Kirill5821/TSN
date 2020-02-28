<?php
namespace frontend\models;
use common\models\Bid;
use yii\base\Model;


class AddBid extends Model
{
    public $id_auction;
    public $id_user;
    public $price;
    public $datecreate;

    public function rules()
    {
        return [
            [['id_auction', 'id_user', 'price', 'datecreate'], 'required'],
            ['id_auction', 'integer'],
            ['id_user', 'integer'],
            ['price', 'double'],
            ['datecreate', 'date', 'format' => 'yyyy-M-d H:m:s'],
        ];
    }
        public function add()
    {       
        if ($this->validate()) {
        $bid = new Bid();
        $bid->id_auction = $this->id_auction;
        $bid->id_user = $this->id_user;
        $bid->price = $this->price;
        $bid->date_of_bid =Yii::$app->formatter->asDate(time());
        return $bid->save();            
        }
        return false;
    }
}   