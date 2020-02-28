<?php

use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use common\models\Auction;
use common\models\Bid;
use yii\widgets\ListView;

$this->title = 'My Yii Application';
?>
<table border="0" class = "top-menu" width = "100%">
    <tr>
        <td colspan = "2" class = "ad_logo">
        </td>
    </tr>
</table>
<table border="0" class = "menuCatalog" width = "100%">
    <tr>
        <td class="sortForm" colspan="2">
            <label>
                Сортировать
                <select name="sort">
                    <option value="0" selected>По популярности</option>
                    <option value="1">По алфавиту</option>
                    <option value="2">По цене</option>
                    <option value="3">По дате срока</option>
                </select>
            </label>
        </td>
    </tr>
    <tr>
        <td width = "22%" class="prd">
            <!--Фильтр-->
            <fieldset class="filter">
                <span class="title">Фильтр<hr></span>

                <div class="leftmenu">
                    <form  role="form" type="GET" action="/lots/index">

                        <span class="title">Тип лота</span>

                        <div class="form-group search-cat">
                            <input type="checkbox" id="typeSite" name="typeSite" value="site"> <label for="typeSite">Сайт</label><br/>
                            <input type="checkbox" id="typeDomain" name="typeDomain" value="dom"> <label for="typeDomain">Android app</label><br/>
                            <input type="checkbox" id="typeIncome" name="typeIncome" value="site-income"> <label for="typeIncome"><b>IOS app</b></label>
                        </div>

                        <span class="title">Мои фильтры</span>

                        <div class="form-group search-cat">
                            <input type="checkbox" id="inFav" name="inFav" value="inFav"> <label for="inFav">Избранное</label><br/>
                        </div>

                        <span class="title">Параметры</span>
                        <div class="search-item">
                            <div class="form-group form-inline"><span class="search-label">Цена</span>
                                <label for="price-from">от</label>
                                <input type="text" class="form-control input-sm cy" id="price-from" name="priceFrom" value="0"/>
                                <label for="price-to">до</label>
                                <input type="text" class="form-control input-sm cy-to" id="price-to" name="priceTo" value="34000000"/>
                            </div>
                            <div class="slide" id="slider-price"></div>
                        </div>

                        <button type="submit" class="btn btn-primary">Подобрать</button>
                    </form>
                </div>

            </fieldset>
        </td>
        <td class="prd">
            <div class="col-md-83 products">
                <div class="row">

                    <table border = "0" width = "83%">
                        <tr>
                            <td>
                                <p class="item-title"><a>Наименование</a></p>
                            </td>
                            <td>
                                <p class="item-title"><a>Заявки</a></p>
                            </td>
                            <td>
                                <p class="item-title"><a>Дата окончания</a></p>
                            </td>
                            <td>
                                <p class="item-title"><a>Цена BIN</a></p>
                            </td>
                            <td>
                                <p class="item-title"><a>Текущая цена</a></p>
                            </td>
                        </tr>
                    </table>
                                <?= ListView::widget([
                'dataProvider' => $dataProvider,
                'itemView' => '_item',
            ]); ?>
                    

                </div>
            </div>
        </td>
    </tr>
</table>