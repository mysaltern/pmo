<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DayWork */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="day-work-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'PERNO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DDATE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DAILYABSENCE')->textInput() ?>

    <?= $form->field($model, 'DAILYMAMURIAT')->textInput() ?>

    <?= $form->field($model, 'DAILYMORKHASI')->textInput() ?>

    <?= $form->field($model, 'EARLYPERMFIRST')->textInput() ?>

    <?= $form->field($model, 'EARLYPERMLAST')->textInput() ?>

    <?= $form->field($model, 'EW_HOLINOTPERM')->textInput() ?>

    <?= $form->field($model, 'EW_HOLIPERM')->textInput() ?>

    <?= $form->field($model, 'EW_INMISSION')->textInput() ?>

    <?= $form->field($model, 'EW_NORMNOTPERM')->textInput() ?>

    <?= $form->field($model, 'EW_NORMPERM')->textInput() ?>

    <?= $form->field($model, 'EW_SPECIAL')->textInput() ?>

    <?= $form->field($model, 'EXTRAWORKTOTAL')->textInput() ?>

    <?= $form->field($model, 'HOLIDAY')->textInput() ?>

    <?= $form->field($model, 'KASRMOR')->textInput() ?>

    <?= $form->field($model, 'LATEPERMFIRST')->textInput() ?>

    <?= $form->field($model, 'LATEPERMLAST')->textInput() ?>

    <?= $form->field($model, 'LEAVEOFABSNOPAY')->textInput() ?>

    <?= $form->field($model, 'LEAVEOFABSPAY')->textInput() ?>

    <?= $form->field($model, 'MISSION')->textInput() ?>

    <?= $form->field($model, 'NIGHTWORK')->textInput() ?>

    <?= $form->field($model, 'NONWORKTOTAL')->textInput() ?>

    <?= $form->field($model, 'NW_ABSENT')->textInput() ?>

    <?= $form->field($model, 'NW_EARLY_FIRST')->textInput() ?>

    <?= $form->field($model, 'NW_EARLY_LAST')->textInput() ?>

    <?= $form->field($model, 'NW_LATE_FIRST')->textInput() ?>

    <?= $form->field($model, 'NW_LATE_LAST')->textInput() ?>

    <?= $form->field($model, 'NW_LEAVENOTPERM')->textInput() ?>

    <?= $form->field($model, 'NW_SPECIAL')->textInput() ?>

    <?= $form->field($model, 'ORDMOR')->textInput() ?>

    <?= $form->field($model, 'PRESENCEINDMAM')->textInput() ?>

    <?= $form->field($model, 'PRESENCEINDMOR')->textInput() ?>

    <?= $form->field($model, 'SERVICELATE')->textInput() ?>

    <?= $form->field($model, 'SUSPENDED')->textInput() ?>

    <?= $form->field($model, 'WORKTOTAL')->textInput() ?>

    <?= $form->field($model, 'WWORK')->textInput() ?>

    <?= $form->field($model, 'SERVICEPRICE')->textInput() ?>

    <?= $form->field($model, 'MEALPRICE')->textInput() ?>

    <?= $form->field($model, 'EDITED')->textInput() ?>

    <?= $form->field($model, 'BeginStr')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'EndStr')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FirstBeginDate')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FirstBeginTime')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'LastEndDate')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'LastEndTime')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'WorkGroup')->textInput() ?>

    <?= $form->field($model, 'ReduceHoliday')->textInput() ?>

    <?= $form->field($model, 'HolidaysCounted')->textInput() ?>

    <?= $form->field($model, 'Section')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CalWork')->textInput() ?>

    <?= $form->field($model, 'EW_HoliInMission')->textInput() ?>

    <?= $form->field($model, 'EW_NormInMission')->textInput() ?>

    <?= $form->field($model, 'EW_BreakNotPerm')->textInput() ?>

    <?= $form->field($model, 'EW_BreakPerm')->textInput() ?>

    <?= $form->field($model, 'PPercent')->textInput() ?>

    <?= $form->field($model, 'CalCode')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
