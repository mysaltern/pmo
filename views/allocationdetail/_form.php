<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;
use slavkovrn\ionrangeslider\IonRangeSliderWidget;
use kartik\slider\Slider;
use faravaghi\jalaliDatePicker\jalaliDatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\AllocationDetail */
/* @var $form yii\widgets\ActiveForm */
?>
<br/>
<br/>
<hr/>
<div class="">
    <div class="">
        <div class="allocation-detail-form">


            <?php $form = ActiveForm::begin(); ?>



            <?php
            $projects = [];
            $projects[''] = 'انتخاب کنید...';
            foreach ($data as $item) {


                $projects = [$item['project'] => $item['name']] + $projects;
            }
            ksort($projects);
            ?>





            <h3>  <span class = "label label-success x2 center-block"><?= $_GET['day']; ?></span></h3>

            <?php
            if ($sumPercent == null) {
                $sumPercent = 100;
            } else {
                $sumPercent = 100 - $sumPercent;
            }

            echo $form->field($model, 'projectID')->dropDownList($projects, ['id' => 'projectID'], ['options' =>
                [

                    'required' => true
                ]
                    ]
            );


            echo $form->field($model, 'level_projectID')->widget(DepDrop::classname(), [
                'options' => ['id' => 'subcat-id'],
                'pluginOptions' => [
                    'depends' => ['projectID'],
                    'placeholder' => 'انتخاب کنید...',
                    'url' => Url::to(['/availability/access'])
                ]
            ]);
            ?>
            <br/>
            <hr/>

            <div class="col-12">

                <div class="col-lg-6">


                    <div class="percent">
                        <label> حداقل درصد برای انتخاب  ۵٪ میباشد</label>

                        <?php
                        echo $form->field($model, 'percent')->widget(Slider::classname(), [
                            'pluginOptions' => [
                                'min' => 5,
                                'max' => $sumPercent,
                                'step' => 5
                            ]
                        ])->label('');
                        ?>

                        <label> در صد باقی مانده :   <?= $sumPercent; ?>%</label>
                    </div>

                </div>







                <div class="col-lg-6">

                    <div class="left-bottom ltr">
                        <br/>
                        <br/>
                        <br/>
                        <hr/>

                        <?php if (!Yii::$app->request->isAjax) { ?>
                            <div class="btn-group-vertical">

                                <?= Html::submitButton($model->isNewRecord ? 'اضافه کردن' : 'Update', ['name' => 'add_item', 'class' => $model->isNewRecord ? 'btn btn-warning' : 'btn btn-primary']) ?>


                                <?= Html::submitButton($model->isNewRecord ? 'ذخیره' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

                            </div>
                        <?php } ?>

                        <?php ActiveForm::end(); ?>

                    </div>

                </div>
            </div>




        </div>
    </div>
</div>

<br/>
<hr/>
<hr/>