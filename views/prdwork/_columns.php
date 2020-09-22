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
        'class' => 'yii\grid\DataColumn', // can be omitted, as it is the default
        'label' => ' اضافه کار',
        'value' => function ($data) {



    $data->EW_NORMPERM = Yii::$app->mycomponent->convertTime($data->EW_NORMPERM);
    return $data->EW_NORMPERM; // $data['name'] for array data, e.g. using SqlDataProvider.
},
    ],
//    [
//        'class' => '\kartik\grid\DataColumn',
//        'attribute' => 'PERIOD',
//    ],
//    [
//        'class' => '\kartik\grid\DataColumn',
//        'attribute' => 'DAYSPRESENT',
//    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'DAYSWORKED',
        'label' => 'نهارو ایاب ذهاب',
        'format' => "raw",
        'value' => function ($data) use ($dataResult) {

    foreach ($dataResult as $item) {

        if ($data->PERNO == $item['PERNO']) {


            if ($item['count'] !== $data->DAYSPRESENT) {
                $color = 'red';
            } else {
                $color = "";
            }
            return "<span style ='color:$color'>" . $data->DAYSPRESENT . "</span>";
        }
    }
},
    ],
    [
        'class' => 'yii\grid\DataColumn', // can be omitted, as it is the default
        'label' => 'کسری کار',
        'value' => function ($data) {

    $data->NONWORKTOTAL = Yii::$app->mycomponent->convertTime($data->NONWORKTOTAL);
    return $data->NONWORKTOTAL; // $data['name'] for array data, e.g. using SqlDataProvider.
},
    ],
//    [
//        'class' => '\kartik\grid\DataColumn',
//        'attribute' => 'EARLYPERMAMOUNT',
//    ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'EARLYPERMCOUNT',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'EW_HOLIPERM',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'EW_HOLINOTPERM',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'EW_INMISSION',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'EW_NORMPERM',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'EW_NORMNOTPERM',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'EW_SPECIAL',
        // ],
//    [
//        'class' => '\kartik\grid\DataColumn',
//        'attribute' => 'EXTRAWORKTOTAL',
//        'label' => ' اضافه کار',
////        'filter' => array("ID1" => "Name1", "ID2" => "Name2")
//    ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'FORGIVEN_LATEAMOUNT',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'FORGIVEN_LATECOUNT',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'HG_MINUTES',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'HG_DAYS',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'HT_MINUTES',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'HT_DAYS',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'KASRMOR',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'LATEPERMAMOUNT',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'LATEPERMCOUNT',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'LEAVEOFABSALLOTED',
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
        // 'attribute'=>'MORKHASILEFT',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'MORKHASIRATION',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'NIGHTWORK',
        // ],
//    [
//        'class' => '\kartik\grid\DataColumn',
//        'attribute' => 'NONWORKTOTAL',
//        'label' => 'کسری کار'
//    ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'NW_ABSENT',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'NW_ABSENTCNT',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'NW_EARLY',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'NW_EARLYCNT',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'NW_LATE',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'NW_LATECNT',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'NW_LEAVENOTPERM',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'NW_LEAVENOTPERMCNT',
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
        // 'attribute'=>'PAYINGDAYS',
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
        // 'attribute'=>'UseHoliday',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'KasrMorSpecial',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'ExtraMorSpecial',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'WorkGroup',
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
        // 'attribute'=>'Work_Over',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'Work_Less',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'WorkBound',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'PYMorLeftUsed',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'PPERCENT1Cnt',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'PPERCENT2Cnt',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'PPERCENT3Cnt',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'PPERCENT4Cnt',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'CalCode',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'LastEditUserCode',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'LastEditDate',
        // ],
//    [
//        'class' => 'kartik\grid\ActionColumn',
//        'dropdown' => false,
//        'vAlign' => 'middle',
//        'urlCreator' => function($action, $model, $key, $index) {
//    return Url::to([$action, 'PERIOD, $PERNO' => $key]);
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
