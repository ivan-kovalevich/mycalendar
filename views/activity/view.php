<?php
/**
 * @var $model \app\models\Activity
 */
?>
<div class="row">
    <div class="col-md-12">
        <h3><?=$model->title?></h3>
    </div>
    <div class="col-md-12">
        <strong>Дата старта: <?=$model->dateStart?></strong>
    </div>
    <div class="col-md-12">
        <?php if($model->file):?>
        <img width="200" src="/images/<?=$model->file;?>">
        <?php endif;?>
    </div>
</div>
