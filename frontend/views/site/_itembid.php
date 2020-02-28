<?php

use yii\helpers\Html;
use common\models\User;

   $user = User::find()->where(['id' => $model['id_user']])->asArray()->one();
?>

<div class="bid">            
    <p class="bid-title">
        <a href="#"><?php echo $user['username']; ?></a>
    </p>    
    <p class="bid-price">Price: $<?= $model->price; ?></p>
    <p class="bid-date"><?= $model->date_of_bid; ?></p>    
</div>