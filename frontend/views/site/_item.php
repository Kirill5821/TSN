<?php

use yii\helpers\Url;
use common\models\Auction;
use common\models\Bid;

$auction = Auction::find()->where(['id_item' => $model->id])->asArray()->one();
?>

<div class="item0">
    <table border="0" width = "100%" height = "100%">
        <tr>
            <td colspan="6">
                <p class="item-title">
                    <a href="#"><?php echo $model->name; ?></a>
                </p>
            </td>
        </tr>
        <tr>
            <td width = "20%" >
                <a href="#"><img src="images/<?php echo $model->image; ?>" width="110" height="60" alt=""></a>
            </td>
            <td width = "10%">
                <p class="item-price">
                    <a href="#"><?php
$bid = Bid::find()->where(['id_auction' => $model->id])->asArray()->all();
echo count($bid);
?></a>
                </p>
            </td>
            <td width = "20%">
                <p class="item-date">
                    <a href="#"><?php echo $auction['dateend']; ?></a>
                </p>
            </td>
            <td width = "15%">
                <p class="item-price">
                    <a href="#">$<?php echo $model->pricebin; ?></a>
                </p>
            </td>
            <td width = "15%">
                <p class="item-price">
                    <a href="#">$<?php echo ((integer) $auction['pricecurrent'] > (integer) $model->pricestart ? $auction['pricecurrent'] : $model->pricestart); ?></a>
                </p>
            </td>
            <td>
                <p>
                    <a class="toProductPage2" href="<?= Url::toRoute(['/site/pageitem', 'id_item' => $model->id]) ?>">Подробнее</a>	    
                </p>
            </td>
        </tr>
    </table>
</div>
