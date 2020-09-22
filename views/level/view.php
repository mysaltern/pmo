<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\LevelProject */
?>
<div class="level-project-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name:ntext',
            'level',
            'projectID',
            'parentID',
        ],
    ]) ?>

</div>
