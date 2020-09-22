<?php

use yii\helpers\Url;

return [
//    [
//        'class' => 'kartik\grid\CheckboxColumn',
//        'width' => '20px',
//    ],
//    [
//        'class' => 'kartik\grid\SerialColumn',
//        'width' => '30px',
//    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'PERNO',
        'label' => '  کد پرسنلی'
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'nahari',
        'label' => 'نهارو ایاب ذهاب'
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'ezafekari',
        'label' => ' اضافه کار'
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'kasri',
        'label' => 'کسری کار'
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'kasriFaeild',
        'label' => 'کسری 2 '
    ],
//    [
//        'class' => '\kartik\grid\DataColumn',
//        'attribute' => 'DAILYABSENCE',
//    ],
//    [
//        'class' => '\kartik\grid\DataColumn',
//        'attribute' => 'DAILYMAMURIAT',
//    ],
//    [
//        'class' => '\kartik\grid\DataColumn',
//        'attribute' => 'DAILYMORKHASI',
//    ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'EARLYPERMFIRST',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'EARLYPERMLAST',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'EW_HOLINOTPERM',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'EW_HOLIPERM',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'EW_INMISSION',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'EW_NORMNOTPERM',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'EW_NORMPERM',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'EW_SPECIAL',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'EXTRAWORKTOTAL',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'HOLIDAY',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'KASRMOR',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'LATEPERMFIRST',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'LATEPERMLAST',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'LEAVEOFABSNOPAY',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'LEAVEOFABSPAY',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'MISSION',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'NIGHTWORK',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'NONWORKTOTAL',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'NW_ABSENT',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'NW_EARLY_FIRST',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'NW_EARLY_LAST',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'NW_LATE_FIRST',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'NW_LATE_LAST',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'NW_LEAVENOTPERM',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'NW_SPECIAL',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'ORDMOR',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'PRESENCEINDMAM',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'PRESENCEINDMOR',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'SERVICELATE',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'SUSPENDED',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'WORKTOTAL',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'WWORK',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'SERVICEPRICE',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'MEALPRICE',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'EDITED',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'BeginStr',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'EndStr',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'FirstBeginDate',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'FirstBeginTime',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'LastEndDate',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'LastEndTime',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'WorkGroup',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'ReduceHoliday',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'HolidaysCounted',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'Section',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'CalWork',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'EW_HoliInMission',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'EW_NormInMission',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'EW_BreakNotPerm',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'EW_BreakPerm',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'PPercent',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'CalCode',
        // ],
//    [
//        'class' => 'kartik\grid\ActionColumn',
//        'dropdown' => false,
//        'vAlign' => 'middle',
//        'urlCreator' => function($action, $model, $key, $index) {
//    return Url::to([$action, 'DDATE, $PERNO' => $key]);
//},
//        'viewOptions' => ['role' => 'modal-remote', 'title' => 'View', 'data-toggle' => 'tooltip'],
//        'updateOptions' => ['role' => 'modal-remote', 'title' => 'Update', 'data-toggle' => 'tooltip'],
//        'deleteOptions' => ['role' => 'modal-remote', 'title' => 'Delete',
//            'data-confirm' => false, 'data-method' => false, // for overide yii data api
//            'data-request-method' => 'post',
//            'data-toggle' => 'tooltip',
//            'data-confirm-title' => 'Are you sure?',
//            'data-confirm-message' => 'Are you sure want to delete this item'],
//    ],
];
