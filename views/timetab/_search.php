<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TimeTabSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="time-tab-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'PerNo') ?>

    <?= $form->field($model, 'CALCDATE') ?>

    <?= $form->field($model, 'BEGINDATE') ?>

    <?= $form->field($model, 'BEGINTIME') ?>

    <?= $form->field($model, 'STATUS') ?>

    <?php // echo $form->field($model, 'DDESC') ?>

    <?php // echo $form->field($model, 'DURATION') ?>

    <?php // echo $form->field($model, 'ENDDATE') ?>

    <?php // echo $form->field($model, 'ENDTIME') ?>

    <?php // echo $form->field($model, 'EXTRAWORKSHEETCODE') ?>

    <?php // echo $form->field($model, 'MAMURIATSHEETCODE') ?>

    <?php // echo $form->field($model, 'MAMURIATTYPE') ?>

    <?php // echo $form->field($model, 'MORKHASISHEETCODE') ?>

    <?php // echo $form->field($model, 'MORKHASITYPE') ?>

    <?php // echo $form->field($model, 'PRESENCETYPE') ?>

    <?php // echo $form->field($model, 'SERVICELATESHEETCODE') ?>

    <?php // echo $form->field($model, 'SUSPENSIONSHEETCODE') ?>

    <?php // echo $form->field($model, 'WORKINGINTERVAL') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
