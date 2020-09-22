<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Profile */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Profiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="profile-view">

    <h1><?= Html::encode($this->title) ?></h1>



    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'personal_code:ntext',
            'name:ntext',
            'last_name:ntext',
            'category_workID',
            'userID',
        ],
    ])
    ?>

</div>
