<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TimeTab */
?>
<div class="time-tab-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'PerNo',
            'CALCDATE',
            'BEGINDATE',
            'BEGINTIME',
            'STATUS',
            'DDESC',
            'DURATION',
            'ENDDATE',
            'ENDTIME',
            'EXTRAWORKSHEETCODE',
            'MAMURIATSHEETCODE',
            'MAMURIATTYPE',
            'MORKHASISHEETCODE',
            'MORKHASITYPE',
            'PRESENCETYPE',
            'SERVICELATESHEETCODE',
            'SUSPENSIONSHEETCODE',
            'WORKINGINTERVAL',
        ],
    ]) ?>

</div>
