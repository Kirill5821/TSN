<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\models\User;
use yii\widgets\ListView;

use yii\helpers\Url;
$this->title = 'Заявки';
?>
	  <div class="row">
        <div class="col-lg-5">
            <h1 class="title3">Список заявок</h1>             
            <table border="0" class = "page-item" width = "100%">
        <tr>
            <td colspan="2">                
            <a class="backBtn" href="<?= Url::toRoute('/site/catalog')?>">Назад</a>
        </td>
    </tr>
    <tr>
        <td class="windowItem" width = "60%">

            
            <?= ListView::widget([
                'dataProvider' => $dataProvider,
                'itemView' => '_itembid',
            ]); ?>
            
        </td>
        <td class="formBid">
            <table>
                <tr>
                    <td class="windowBid">
                        <fieldset class="account-info">
                    
					<div class="product">
						<div class="product-img">
							<a href="#"><img src="images/<?php echo $item['image'];?>" width="170" height="100" alt=""></a>
						</div>
						<p class="product-title">
							<a href="#"><?php echo $item['name'];?></a>
						</p>
						<p class="product-price">Price: $<?php echo $item['pricestart'];?></p>						
							<a class="toProductPage" href="<?= Url::toRoute(['/site/pageitem', 'id_item' => $item['id']])?>">Подробнее</a>						
					</div>	
             </fieldset>
                    </td>                    
                </tr>                            
            </table>
        </td>
    </tr>
</table>
        </div>
    </div>