<?php

namespace frontend\models;

use yii\base\Model;

class AddAuction extends Model {

    public $id_item;
    public $pricecurrent;
    public $state;
    public $datestart;
    public $dateend;

    public function rules() {
        return [

            [['id_item', 'pricecurrent', 'datestart', 'dateend'], 'required'],
            ['id_item', 'integer'],
            ['pricecurrent', 'double'],
        ];
    }

    public function add() {
        if ($this->validate()) {
            $auction = new Auction();
            $auction->id_item = $this->id_item;
            $auction->pricecurrent = $this->pricecurrent;
            $auction->datestart = $this->datestart;
            $auction->dateend = $this->dateend;
            return $auction->save();
        }
        return false;
    }
}
