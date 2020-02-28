<?php
namespace frontend\models;
use common\models\Item;
use common\models\Auction;
use yii\base\Model;
use Yii;

class AddItem extends Model
{
    public $name;
    public $link;
    public $type;
    public $id_client;
    public $image;
    public $pricestart;
    public $pricebin;
    public $dateend;
    public $description;
    
    public function rules()
    {
        return [            
            [['name', 'type', 'pricestart', 'dateend'], 'required', 'message' => 'Незаполненно поле!'],
            ['id_client', 'integer'],
            ['description', 'string'],
            ['link', 'string'],
            ['type', 'integer'],
            //['dateend', 'date'],//, 'format' => 'dd.mm.yyyy hh:ii'],
            ['pricestart', 'double'],
            ['pricebin', 'double'],
            ['image', 'file', 'extensions'=>'png,jpg'],
        ];
    }

        public function add()
    {       
            if ($this->validate()) {
        $item = new Item();
        $item->name = $this->name;
        $item->link = $this->link;
        $item->id_catalog = $this->type;
        $item->id_client = $this->id_client;
        $item->image = $this->image;
        $item->pricestart = $this->pricestart;
        $item->pricebin = $this->pricebin;
        $item->description = $this->description;
        $item->link = $this->link;     
        $item->save();
        $auction = new Auction();
        $auction->id_item = $item->id;
        $auction->datestart = Yii::$app->formatter->asDate(time());
        $auction->dateend = $this->dateend;
        return $auction->save();     
        }
        return false;
    }
}
   