<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AllocationDetail */
?>
<div class="allocation-detail-view">

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
//            'duration',
//            'allocationID',
            'levelProject.name',
            'percent',
        ],
    ])
    ?>

</div>
