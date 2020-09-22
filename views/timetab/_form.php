<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TimeTab */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="time-tab-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'PerNo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CALCDATE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'BEGINDATE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'BEGINTIME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'STATUS')->textInput() ?>

    <?= $form->field($model, 'DDESC')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DURATION')->textInput() ?>

    <?= $form->field($model, 'ENDDATE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ENDTIME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'EXTRAWORKSHEETCODE')->textInput() ?>

    <?= $form->field($model, 'MAMURIATSHEETCODE')->textInput() ?>

    <?= $form->field($model, 'MAMURIATTYPE')->textInput() ?>

    <?= $form->field($model, 'MORKHASISHEETCODE')->textInput() ?>

    <?= $form->field($model, 'MORKHASITYPE')->textInput() ?>

    <?= $form->field($model, 'PRESENCETYPE')->textInput() ?>

    <?= $form->field($model, 'SERVICELATESHEETCODE')->textInput() ?>

    <?= $form->field($model, 'SUSPENSIONSHEETCODE')->textInput() ?>

    <?= $form->field($model, 'WORKINGINTERVAL')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
