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

<div class="row">

    <div class="col-md-2 col-md-offset-5">
        <div class="allocation-detail-form">


            <?php $form = ActiveForm::begin(); ?>


            <div class="card text-center">
                <div class="shadow-salt">
                    <div class="card-body">
                        <?php
                        echo faravaghi\jalaliDatePicker\jalaliDatePicker::widget([
                            'name' => 'AllocationDetail[day]',
                            'value' => '1399/06/20',
                            'options' => array(
                                'format' => 'yyyy/mm/dd',
                                'viewformat' => 'yyyy/mm/dd',
                                'placement' => 'left',
                                'todayBtn' => 'linked',
                            ),
                        ]);
                        ?>

                    </div>
                    <div class="card-footer text-muted">

                        <br/>
                        <div class="form-group">
                            <?= Html::submitButton($model->isNewRecord ? 'ادامه...' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                        </div>


                    </div>
                </div>
            </div>



            <?php ActiveForm::end(); ?>

        </div>

    </div>
</div>