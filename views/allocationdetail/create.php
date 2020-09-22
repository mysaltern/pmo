<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\AllocationDetail */
?>
<div class="allocation-detail-create">
    <?=
    $this->render('_form', [
        'model' => $model,
        'data' => $data,
        'sumPercent' => $sumPercent,
    ])
    ?>
</div>




<?=
GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
//        'id',
//        'duration',
//        'allocationID',
        'levelProject.name',
        'percent',
//        ['class' => 'yii\grid\ActionColumn'],
    ],
]);
?>