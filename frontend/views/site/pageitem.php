<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\AddItem */
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Описание товара';
?>
<table border="0" class = "top-menu" width = "100%">
	<tr>
	<td colspan = "2" class = "ad_logo">
	</td>
	</tr>
</table>
<h1><?= Html::encode($this->title) ?></h1>
<table border="0" class = "page-item" width = "100%">
        <tr>
            <td colspan="2">                
            <a class="backBtn" href="<?= Url::toRoute('/site/catalog')?>">Назад</a>
        </td>
    </tr>
    <tr>
        <td class="windowItem" width = "60%">
            <a class="itemlogo" href=""><img src="images/<?php echo $item['image'];?>" width="650"></a>
            <b><a class ="nameIten"><?php echo $item['name'];?></a></b>            
            <p><a href="http://<?php echo $item['link'];?>">ссылка: <?php echo $item['link'];?></a></p>
            <p>.</p>
            <p><a class ="descrItenTitle">Описание</a></p><hr align="center" color="black" size=2 width=100%>
            <a class ="descrIten"><?php echo $item['description'];?></a>
        </td>
        <td class="formBid">
            <table>
                <tr>
                    <td class="windowBid">
                        <fieldset class="account-info">
                    <p><a class ="descrIten">Стартовая цена: $<?php echo $item['pricestart'];?></a></p>
            <p><a class ="descrItenTitle">Текущая цена: $<?php echo $auction['pricecurrent'];?></a></p>
            <p><a class ="descrIten">Цена BIN: $<?php echo $item['pricebin'];?></a></p>
            <?= Html::a('заявки', ['site/pagebids', 'id_item' => $item['id']]) ?>
                <?php $form = ActiveForm::begin(['id' => 'add-bid']); ?>

                <?= $form->field($model, 'price')->input('number')->label('Цена: ') ?>
                                
                <div class="form-group">
                    <?= Html::submitButton('Сделать ставку', ['class' => 'btn btn-primary', 'name' => 'add-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
             </fieldset>
                    </td>                    
                </tr>                            
            </table>
        </td>
    </tr>
</table>