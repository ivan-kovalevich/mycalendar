<?php
use kartik\datetime\DateTimePicker;

?>

<div class="row">
    <div class="col-md-12">
        <h3>Новое событие</h3>
    </div>
</div>
<?php $form = \yii\bootstrap\ActiveForm::begin();?>
<div class="row">
    <div class="col-md-12">
        <?= $form->field($model, 'title') ?>
        <?= $form->field($model, 'description')->textarea([
                'rows' => 4,
        ]) ?>
    </div>

</div>
<div class="row">
    <div class="col-md-6">
        <?= $form->field($model, 'dateStart')->widget(DateTimePicker::class, [
            'convertFormat' => true,
            'pluginOptions' => [
                'format' => 'dd.MM.yyyy hh:i',
                'autoclose'=>true,
                'weekStart'=>1, //неделя начинается с понедельника
                'startDate' => '01.08.2019 00:00', //самая ранняя возможная дата
                'todayBtn'=>true, //снизу кнопка "сегодня"
                'todayHighlight' => true
            ]
        ]) ?>
    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'dateEnd')->widget(DateTimePicker::class, [
            'convertFormat' => true,
            'pluginOptions' => [
                'format' => 'dd.MM.yyyy hh:i',
                'autoclose'=>true,
                'weekStart'=>1, //неделя начинается с понедельника
                'startDate' => '01.08.2019 00:00', //самая ранняя возможная дата
                'todayBtn'=>true, //снизу кнопка "сегодня"
                'todayHighlight' => true
            ]
        ]) ?>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <?= $form->field($model, 'isRepeated')->checkbox() ?>
    </div>
    <div class="col-md-8">
        <?= $form->field($model, 'isBlocked')->checkbox() ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <button class="btn btn-default" type="submit">Создать</button>
    </div>
</div>



<?php \yii\bootstrap\ActiveForm::end();?>

