<?php

use yii\helpers\Url;

return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'id',
    // ],
    [
        'label' => 'نام واحد',
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'categoryWork.name',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'level.name',
    ],
//    [
//        'class' => '\kartik\grid\DataColumn',
//        'attribute' => 'levelProject.name',
//    ],
    [
        'label' => 'نام پروژه',
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'project.name',
    ],
//    [
//        'class'=>'\kartik\grid\DataColumn',
//        'attribute'=>'type',
//    ],
    [
        'class' => 'yii\grid\DataColumn', // can be omitted, as it is the default
        'label' => 'نام و نام خانوادگی',
        'value' => function ($data) {


    if (isset($data->profileID)) {

        $userId = \app\models\Profile::findOne(['id' => $data->profileID]);
        $nameLastName = \app\models\Profile::nameLastName($userId);
        return $nameLastName;
    }
},
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign' => 'middle',
        'urlCreator' => function($action, $model, $key, $index) {
    return Url::to([$action, 'id' => $key]);
},
        'viewOptions' => ['role' => 'modal-remote', 'title' => 'View', 'data-toggle' => 'tooltip'],
        'updateOptions' => ['role' => 'modal-remote', 'title' => 'Update', 'data-toggle' => 'tooltip'],
        'deleteOptions' => ['role' => 'modal-remote', 'title' => 'Delete',
            'data-confirm' => false, 'data-method' => false, // for overide yii data api
            'data-request-method' => 'post',
            'data-toggle' => 'tooltip',
            'data-confirm-title' => 'Are you sure?',
            'data-confirm-message' => 'Are you sure want to delete this item'],
    ],
];
