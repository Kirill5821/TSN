<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\datetime\DateTimePicker;
$this->title = 'My Yii Application';
?>

	  <div class="row">
        <div class="col-lg-5">
            <h1 class="title3">Добавление нового товара</h1>
            <?php $form = ActiveForm::begin(['id' => 'add-item']); ?>

                <?= $form->field($model, 'name')->textInput(['autofocus' => true])->label('Наименование') ?>
                
                <?= $form->field($model, 'type')->dropDownList([
    '0' => 'Website',
    '1' => 'Android',
    '2'=>'Ios'
])->label('Тип'); ?>
            

                <?= $form->field($model, 'link')->label('Ссылка')?>
            
                <?= $form->field($model, 'image')->input('file')->label('Изображение') ?>

                <?= $form->field($model, 'pricestart')->input('number')->label('Стартовая цена') ?>

                <?= $form->field($model, 'pricebin')->input('number')->label('Цена BIN') ?>
            
               <?= /*$form->field($model, 'dateend')->textInput()->label('Дата окончания аукциона');  
            
                        DateTimePicker::widget([
    'model' => $model,
    'attribute' => 'dateend',
    'language' => 'ru',
    'pluginOptions' => [
        'dateFormat' => 'yy-mm-dd',
    ],
]);
       
                
                       
 DateTimePicker::widget([
 'name' => 'check_issue_date',     
 'value' => date('d.m.Y h:i', strtotime('+7 days')),
 'options' => ['placeholder' => 'Выберите дату окончания...'],
 'pluginOptions' => [
 'todayHighlight' => true,
     'format' => 'dd.mm.yyyy hh:ii',
        'autoclose'=>true,
        'weekStart'=>1, //неделя начинается с понедельника
        'startDate' => date("d.m.Y h:i"), //самая ранняя возможная дата
        'todayBtn'=>true, //снизу кнопка "сегодня"
        'endDate' => date('d.m.Y h:i', strtotime('+30 days')) //максимум 30 дней
 ]
]);
        */
              
               
               
               $form->field($model, 'dateend')->widget(DateTimePicker::className(),[
                   'name' => 'check_issue_date',     
 'value' => date('d.m.Y h:i', strtotime('+7 days')),
 'options' => ['placeholder' => 'Выберите дату окончания...'],
 'pluginOptions' => [
 'todayHighlight' => true,
     'format' => 'dd.mm.yyyy hh:ii',
        'autoclose'=>true,
        'weekStart'=>1, //неделя начинается с понедельника
        'startDate' => date("d.m.Y h:i"), //самая ранняя возможная дата
        'todayBtn'=>true, //снизу кнопка "сегодня"
        'endDate' => date('d.m.Y h:i', strtotime('+30 days')) //максимум 30 дней
 ]
])->label('Дата окончания аукциона');
                

?>
            
                <?= $form->field($model, 'description')->textarea(['rows' => 5])->label('Описание') ?>
            
                <div class="form-group">
                    <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary', 'name' => 'add-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>