<?php
/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'My Yii Application';
?>
<table border="0" class = "top-menu" width = "100%">
    <tr>
        <td colspan = "2" class = "ad_logo">
        </td>
    </tr>
</table>
<table border="0" class = "menuItems" width = "100%">
    <tr>
        <td colspan = "3" height="100px">
            <h1><a class = "main_title"> Веб-сайты ></a><hr/></h1>
            <h2><a class = "main_title2"> Премиум </a></h2>

        </td></tr>
    <tr>
        <td width="7%">
            <a class = "left_btn" href=""><</a>
        </td>
        <td>
            <div class="col-md-83">
                <div class="row"> 
                    <?php
                    $i = 0;
                    foreach ($items as $item):
                        if ($i >= 4)
                            break;
                        $i++;
                        ?>                            
                        <div class="col-sm-3">
                            <div class="product">
                                <div class="product-img">
                                    <a href="#"><img src="images/<?php echo $item['image']; ?>" width="170" height="100" alt=""></a>
                                </div>
                                <p class="product-title">
                                    <a href="#"><?php echo $item['name']; ?></a>
                                </p>
                                <p class="product-price">Price: $<?php echo $item['pricestart']; ?></p>						
                                <a class="toProductPage" href="<?= Url::toRoute(['/site/pageitem', 'id_item' => $item['id']]) ?>">Подробнее</a>						
                            </div>
                        </div>                            
                        <?php
                    endforeach;
                    ?>    
                </div>
        </td>
        <td width="7%">
            <a class = "right_btn" href="">></a>
        </td>
    </tr>
    <tr>
        <td colspan = "3" height="100px">
            <h1><a class = "main_title"> Мобильные приложения ></a><hr/></h1>
            <h2><a class = "main_title2"> Премиум</a></h2>
        </td></tr>
    <tr>
        <td width="7%">
            <a class = "left_btn" href=""><</a>
        </td>
        <td>
            <div class="col-md-83">
                <div class="row">
                    <?php
                    foreach ($items2 as $item2):
                        ?>                            
                        <div class="col-sm-3">
                            <div class="product">
                                <div class="product-img">
                                    <a href="#"><img src="images/<?php echo $item2['image']; ?>" width="170" height="100" alt=""></a>
                                </div>
                                <p class="product-title">
                                    <a href="#"><?php echo $item2['name']; ?></a>
                                </p>
                                <p class="product-price">Price: $<?php echo $item2['pricestart']; ?></p>						
                                <a class="toProductPage" href="<?= Url::toRoute(['/site/pageitem', 'id_item' => $item2['id']]) ?>">Подробнее</a>						
                            </div>
                        </div>   
                        <?php
                    endforeach;
                    ?>  
                </div>
            </div>
        </td>
        <td width="7%">
            <a class = "right_btn" href="">></a>
        </td></tr>
</table>

