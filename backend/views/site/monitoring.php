<?php

use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\widgets\ListView;
use common\models\Auction;
use common\models\Item;
use common\models\User;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Monitoring';

$dataProvider = new ActiveDataProvider([
    'query' => Auction::find()->where(['state' => 2]),
    'pagination' => [
        'pageSize' => 10,
    ],
        ]);
?>
<h2>Успешные сделки</h2>
<?=
GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        ['attribute' => 'id_item',
            'label' => 'Название товара',
            'content' => function($data) {
                return Item::find()->where(['id' => $data->id_item])->asArray()->one()['name'];
            },
                ],
                ['attribute' => 'pricecurrent',
                    'label' => 'Цена',
                    'content' => function($data) {
                        return '$' . $data->pricecurrent;
                    },
                ],
                ['attribute' => 'id_winner',
                    'label' => 'Победитель',
                    'content' => function($data) {
                        return User::find()->where(['id' => $data->id_winner])->asArray()->one()['username'];
                    },
                        ],
                        ['attribute' => 'id_item',
                            'label' => 'Продавец',
                            'content' => function($data) {
                                $item0 = Item::find()->where(['id' => $data->id_item])->asArray()->one();
                                return User::find()->where(['id' => $item0['id_client']])->asArray()->one()['username'];
                            },
                                ],
                                ['attribute' => 'dateend',
                                    'label' => 'Дата сделки',
                                ],
                                ['class' => 'yii\grid\ActionColumn'],
                            ],
                        ]);
                        ?>