<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>

        <?php
        if (isset($_GET['exit'])) {
            exit1();
        }
        function Exit1() {
            //real search code goes here
            Yii::$app->user->logout();
            Url::toRoute('/site/index');
        }
        ?>

        <table border="0" class = "top-menu" width = "100%">
            <tr>
                <td width = "10%">
                    <a class="navbar-logo" href=""><img src="images/logo.png"></a>
                </td>
                <td>
                    <nav>
                        <ul>
                            <li class="left-item"><a href="<?= Url::toRoute('/site/index') ?>">Главная</a></li>
                            <li class="left-item"><a href="<?= Url::toRoute('/site/catalog') ?>">Каталог</a></li>
                            <li class="left-item"><a href="<?= Url::toRoute('/site/contact') ?>">Контакты</a></li>
<?php
if (Yii::$app->user->isGuest) {
    ?>
                                <li class="right-item"><a href="<?= Url::toRoute('/site/signup') ?>">Регистрация</a></li>
                                <li class="right-item"><a href="<?= Url::toRoute('/site/login') ?>">Вход</a></li>
                                <?php
                            } else {
                                ?>

    <!--<li class="right-item"><a href="<?= Url::toRoute('/site/logout') ?>">Выход</a></li> -->
                                <li class="right-item"><a href="?exit">Выход</a></li>
                                <li class="right-item2"><a href="<?= Url::toRoute('/site/additem') ?>">Продать товар</a></li>
    <?php
}
?>
                        </ul>
                    </nav>
                </td></tr>
            <tr class = "top-menu2">
                <td colspan = "2">
                    <nav class="menu-nav2">
                        <ul class="menu">
                            <li class="left-item2"><a href="index.html">Веб-сайты v</a>
                            </li>
                            <li class="left-item2"><a href="#">Мобильные приложения v</a>
                            </li>
                            <li class="left-item2"><a href="">Реклама</a></li>

                        </ul>
                    </nav>
                </td>
            </tr>
        </table>
        <div class="container">
<?= $content ?>
        </div>
    </div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
