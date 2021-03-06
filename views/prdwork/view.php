<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PrdWork */
?>
<div class="prd-work-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'PERNO',
            'PERIOD',
            'DAYSPRESENT',
            'DAYSWORKED',
            'EARLYPERMAMOUNT',
            'EARLYPERMCOUNT',
            'EW_HOLIPERM',
            'EW_HOLINOTPERM',
            'EW_INMISSION',
            'EW_NORMPERM',
            'EW_NORMNOTPERM',
            'EW_SPECIAL',
            'EXTRAWORKTOTAL',
            'FORGIVEN_LATEAMOUNT',
            'FORGIVEN_LATECOUNT',
            'HG_MINUTES',
            'HG_DAYS',
            'HT_MINUTES',
            'HT_DAYS',
            'KASRMOR',
            'LATEPERMAMOUNT',
            'LATEPERMCOUNT',
            'LEAVEOFABSALLOTED',
            'LEAVEOFABSNOPAY',
            'LEAVEOFABSPAY',
            'MISSION',
            'MORKHASILEFT',
            'MORKHASIRATION',
            'NIGHTWORK',
            'NONWORKTOTAL',
            'NW_ABSENT',
            'NW_ABSENTCNT',
            'NW_EARLY',
            'NW_EARLYCNT',
            'NW_LATE',
            'NW_LATECNT',
            'NW_LEAVENOTPERM',
            'NW_LEAVENOTPERMCNT',
            'NW_SPECIAL',
            'ORDMOR',
            'PAYINGDAYS',
            'PRESENCEINDMAM',
            'PRESENCEINDMOR',
            'SERVICELATE',
            'WORKTOTAL',
            'WWORK',
            'SERVICEPRICE',
            'MEALPRICE',
            'EDITED',
            'UseHoliday',
            'KasrMorSpecial',
            'ExtraMorSpecial',
            'WorkGroup',
            'Section',
            'CalWork',
            'EW_HoliInMission',
            'EW_NormInMission',
            'EW_BreakNotPerm',
            'EW_BreakPerm',
            'Work_Over',
            'Work_Less',
            'WorkBound',
            'PYMorLeftUsed',
            'PPERCENT1Cnt',
            'PPERCENT2Cnt',
            'PPERCENT3Cnt',
            'PPERCENT4Cnt',
            'CalCode',
            'LastEditUserCode',
            'LastEditDate',
        ],
    ]) ?>

</div>
