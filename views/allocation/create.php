<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AllocationDetail */

$this->title = 'Create Allocation Detail';
$this->params['breadcrumbs'][] = ['label' => 'Allocation Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="allocation-detail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
