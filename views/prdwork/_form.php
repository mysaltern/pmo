<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PrdWork */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prd-work-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'PERNO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PERIOD')->textInput() ?>

    <?= $form->field($model, 'DAYSPRESENT')->textInput() ?>

    <?= $form->field($model, 'DAYSWORKED')->textInput() ?>

    <?= $form->field($model, 'EARLYPERMAMOUNT')->textInput() ?>

    <?= $form->field($model, 'EARLYPERMCOUNT')->textInput() ?>

    <?= $form->field($model, 'EW_HOLIPERM')->textInput() ?>

    <?= $form->field($model, 'EW_HOLINOTPERM')->textInput() ?>

    <?= $form->field($model, 'EW_INMISSION')->textInput() ?>

    <?= $form->field($model, 'EW_NORMPERM')->textInput() ?>

    <?= $form->field($model, 'EW_NORMNOTPERM')->textInput() ?>

    <?= $form->field($model, 'EW_SPECIAL')->textInput() ?>

    <?= $form->field($model, 'EXTRAWORKTOTAL')->textInput() ?>

    <?= $form->field($model, 'FORGIVEN_LATEAMOUNT')->textInput() ?>

    <?= $form->field($model, 'FORGIVEN_LATECOUNT')->textInput() ?>

    <?= $form->field($model, 'HG_MINUTES')->textInput() ?>

    <?= $form->field($model, 'HG_DAYS')->textInput() ?>

    <?= $form->field($model, 'HT_MINUTES')->textInput() ?>

    <?= $form->field($model, 'HT_DAYS')->textInput() ?>

    <?= $form->field($model, 'KASRMOR')->textInput() ?>

    <?= $form->field($model, 'LATEPERMAMOUNT')->textInput() ?>

    <?= $form->field($model, 'LATEPERMCOUNT')->textInput() ?>

    <?= $form->field($model, 'LEAVEOFABSALLOTED')->textInput() ?>

    <?= $form->field($model, 'LEAVEOFABSNOPAY')->textInput() ?>

    <?= $form->field($model, 'LEAVEOFABSPAY')->textInput() ?>

    <?= $form->field($model, 'MISSION')->textInput() ?>

    <?= $form->field($model, 'MORKHASILEFT')->textInput() ?>

    <?= $form->field($model, 'MORKHASIRATION')->textInput() ?>

    <?= $form->field($model, 'NIGHTWORK')->textInput() ?>

    <?= $form->field($model, 'NONWORKTOTAL')->textInput() ?>

    <?= $form->field($model, 'NW_ABSENT')->textInput() ?>

    <?= $form->field($model, 'NW_ABSENTCNT')->textInput() ?>

    <?= $form->field($model, 'NW_EARLY')->textInput() ?>

    <?= $form->field($model, 'NW_EARLYCNT')->textInput() ?>

    <?= $form->field($model, 'NW_LATE')->textInput() ?>

    <?= $form->field($model, 'NW_LATECNT')->textInput() ?>

    <?= $form->field($model, 'NW_LEAVENOTPERM')->textInput() ?>

    <?= $form->field($model, 'NW_LEAVENOTPERMCNT')->textInput() ?>

    <?= $form->field($model, 'NW_SPECIAL')->textInput() ?>

    <?= $form->field($model, 'ORDMOR')->textInput() ?>

    <?= $form->field($model, 'PAYINGDAYS')->textInput() ?>

    <?= $form->field($model, 'PRESENCEINDMAM')->textInput() ?>

    <?= $form->field($model, 'PRESENCEINDMOR')->textInput() ?>

    <?= $form->field($model, 'SERVICELATE')->textInput() ?>

    <?= $form->field($model, 'WORKTOTAL')->textInput() ?>

    <?= $form->field($model, 'WWORK')->textInput() ?>

    <?= $form->field($model, 'SERVICEPRICE')->textInput() ?>

    <?= $form->field($model, 'MEALPRICE')->textInput() ?>

    <?= $form->field($model, 'EDITED')->textInput() ?>

    <?= $form->field($model, 'UseHoliday')->textInput() ?>

    <?= $form->field($model, 'KasrMorSpecial')->textInput() ?>

    <?= $form->field($model, 'ExtraMorSpecial')->textInput() ?>

    <?= $form->field($model, 'WorkGroup')->textInput() ?>

    <?= $form->field($model, 'Section')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CalWork')->textInput() ?>

    <?= $form->field($model, 'EW_HoliInMission')->textInput() ?>

    <?= $form->field($model, 'EW_NormInMission')->textInput() ?>

    <?= $form->field($model, 'EW_BreakNotPerm')->textInput() ?>

    <?= $form->field($model, 'EW_BreakPerm')->textInput() ?>

    <?= $form->field($model, 'Work_Over')->textInput() ?>

    <?= $form->field($model, 'Work_Less')->textInput() ?>

    <?= $form->field($model, 'WorkBound')->textInput() ?>

    <?= $form->field($model, 'PYMorLeftUsed')->textInput() ?>

    <?= $form->field($model, 'PPERCENT1Cnt')->textInput() ?>

    <?= $form->field($model, 'PPERCENT2Cnt')->textInput() ?>

    <?= $form->field($model, 'PPERCENT3Cnt')->textInput() ?>

    <?= $form->field($model, 'PPERCENT4Cnt')->textInput() ?>

    <?= $form->field($model, 'CalCode')->textInput() ?>

    <?= $form->field($model, 'LastEditUserCode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'LastEditDate')->textInput(['maxlength' => true]) ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
