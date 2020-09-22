<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DayWork */
?>
<div class="day-work-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'PERNO',
            'DDATE',
            'DAILYABSENCE',
            'DAILYMAMURIAT',
            'DAILYMORKHASI',
            'EARLYPERMFIRST',
            'EARLYPERMLAST',
            'EW_HOLINOTPERM',
            'EW_HOLIPERM',
            'EW_INMISSION',
            'EW_NORMNOTPERM',
            'EW_NORMPERM',
            'EW_SPECIAL',
            'EXTRAWORKTOTAL',
            'HOLIDAY',
            'KASRMOR',
            'LATEPERMFIRST',
            'LATEPERMLAST',
            'LEAVEOFABSNOPAY',
            'LEAVEOFABSPAY',
            'MISSION',
            'NIGHTWORK',
            'NONWORKTOTAL',
            'NW_ABSENT',
            'NW_EARLY_FIRST',
            'NW_EARLY_LAST',
            'NW_LATE_FIRST',
            'NW_LATE_LAST',
            'NW_LEAVENOTPERM',
            'NW_SPECIAL',
            'ORDMOR',
            'PRESENCEINDMAM',
            'PRESENCEINDMOR',
            'SERVICELATE',
            'SUSPENDED',
            'WORKTOTAL',
            'WWORK',
            'SERVICEPRICE',
            'MEALPRICE',
            'EDITED',
            'BeginStr',
            'EndStr',
            'FirstBeginDate',
            'FirstBeginTime',
            'LastEndDate',
            'LastEndTime',
            'WorkGroup',
            'ReduceHoliday',
            'HolidaysCounted',
            'Section',
            'CalWork',
            'EW_HoliInMission',
            'EW_NormInMission',
            'EW_BreakNotPerm',
            'EW_BreakPerm',
            'PPercent',
            'CalCode',
        ],
    ]) ?>

</div>
