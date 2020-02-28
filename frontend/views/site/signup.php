<?php

use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>
<table border="0" width = "100%">

    <tr>
        <td class="site-signu2p">
            <h1><?= Html::encode($this->title) ?></h1>
            <p>Пожалуйста, заполните следующие поля, чтобы зарегистрироваться:</p>
            <div class="row">
                <div class="col-lg-5">
                    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                    <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Логин') ?>
                    <?= $form->field($model, 'fullname')->label('ФИО') ?>
                    <?=
                    $form->field($model, 'dateofbirth')->widget(DatePicker::className(), [
                        'name' => 'dob',
                        'value' => date('d.m.Y', strtotime('-20 years')),
                        'options' => ['placeholder' => 'Выберите дату рождения...'],
                        'pluginOptions' => [
                            'todayHighlight' => true,
                            'format' => 'dd.mm.yyyy',
                            'autoclose' => true,
                            'weekStart' => 1, //неделя начинается с понедельника
                            'startDate' => date("d.m.Y", strtotime('-120 years')), //самая ранняя возможная дата
                            'endDate' => date('d.m.Y') //максимум 30 дней
                        ]
                    ])->label('Дата рождения');
                    ?>
                    <?= $form->field($model, 'email')->label('Email') ?>
                    <?= $form->field($model, 'password')->passwordInput()->label('Пароль') ?>
                    <div class="form-group">
                        <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </td>
    </tr>
</table>