<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\LevelProject */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="level-project-form">


    <?php
    $form = ActiveForm::begin([
                'enableAjaxValidation' => true,
                'enableClientValidation' => true,
                    //'id' => 'ajax'
    ]);
    ?>
    <?= $form->field($model, 'name')->input('text') ?>



    <?php
    $projects = \app\models\Project::find()->all();
    $projects = ArrayHelper::map($projects, 'id', "name");
    ?>
    <?php
    // Parent 
    echo $form->field($model, 'projectID', ['enableAjaxValidation' => true])->dropDownList($projects, ['id' => 'projectID']);

// Child # 1
    echo $form->field($model, 'parentID', ['enableAjaxValidation' => true])->widget(DepDrop::classname(), [
        'options' => ['id' => 'subcat-id'],
        'pluginOptions' => [
            'depends' => ['projectID'],
            'placeholder' => 'Select...',
            'url' => Url::to(['/level/access'])
        ]
    ]);
    ?>





    <?php if (!Yii::$app->request->isAjax) { ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>

    <?php ActiveForm::end(); ?>

</div>
