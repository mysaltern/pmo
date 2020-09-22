<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Availability */
?>
<div class="availability-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'category_workID',
            'levelID',
            'projectID',
            'type',
            'profileID',
        ],
    ]) ?>

</div>
