<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Availability */
/* @var $form yii\widgets\ActiveForm */
?>


<?php
if (isset($_GET['type'])) {
    $type = 1;
} else {
    $type = 2;
}
?>
<div class = "availability-form">

    <?php $form = ActiveForm::begin();
    ?>

    <?php
    if ($type == 1) {
        ?>
        <?php
        $profileID = \app\models\Profile::find()->all();
        $profileID = ArrayHelper::map($profileID, 'id', "last_name");
        ?>
        <?php
        echo $form->field($model, 'profileID')->dropDownList(
                $profileID, ['prompt' => 'Select...']
        );
        ?>


        <?php
    } else {
        ?>



        <?php
        $WorkCategory = \app\models\WorkCategory::find()->all();
        $WorkCategory = ArrayHelper::map($WorkCategory, 'id', 'name');
        ?>
        <?php
        echo $form->field($model, 'category_workID')->dropDownList(
                $WorkCategory, ['prompt' => 'Select...']
        );
    }
    ?>


    <?php
    $projectID = [0 => 'انتخاب کنید'];
    $projectIdData = \app\models\Project::find()->all();
    $projectID += ArrayHelper::map($projectIdData, 'id', 'name');
    ?>
    <?php
//    echo $form->field($model, 'projectID')->dropDownList(
//            $projectID, ['prompt' => 'Select...']
//    );
    ?>



<?php
// Parent 
echo $form->field($model, 'projectID')->dropDownList($projectID, ['id' => 'cat-id']);

// Child # 1
echo $form->field($model, 'levelID')->widget(DepDrop::classname(), [
    'options' => ['id' => 'subcat-id'],
    'pluginOptions' => [
        'depends' => ['cat-id'],
        'placeholder' => 'Select...',
        'url' => Url::to(['/availability/subcat'])
    ]
]);
?>









<?php // echo $form->field($model, 'type')->textInput()       ?>






<?php if (!Yii::$app->request->isAjax) { ?>
        <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
        <?php } ?>

    <?php ActiveForm::end(); ?>

</div>
