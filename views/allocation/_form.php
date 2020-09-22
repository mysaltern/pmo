<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AllocationDetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="allocation-detail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'duration')->textInput() ?>

    <?= $form->field($model, 'allocationID')->textInput() ?>

    <?= $form->field($model, 'level_projectID')->textInput() ?>

    <?= $form->field($model, 'percent')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
