<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AllocationDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Allocation Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="allocation-detail-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Allocation Detail', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'duration',
            'allocationID',
            'level_projectID',
            'percent',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
