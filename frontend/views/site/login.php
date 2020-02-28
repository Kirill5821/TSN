<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$this->title = 'Вход в систему';
$this->params['breadcrumbs'][] = $this->title;
?>
<fieldset class="login-window1">
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Пожалуйста, заполните следующие поля для входа:</p>

    <div class="row">
        
        <div class="col-lg-5">
            
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Логин') ?>

                <?= $form->field($model, 'password')->passwordInput()->label('Пароль') ?>

                <?= $form->field($model, 'rememberMe')->checkbox()->label('Запомнить меня') ?>

                <div style="color:#999;margin:1em 0">
                    Если вы забыли свой пароль, вы можете <?= Html::a('сбросить', ['site/request-password-reset']) ?>.
                    <br>
                    Нужно новое письмо с подтверждением? <?= Html::a('Отправить', ['site/resend-verification-email']) ?>
                </div>
                <div class="form-group">
                    <?= Html::submitButton('Войти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>                
        </div>            
    </div>
</div>
</fieldset>
