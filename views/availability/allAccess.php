<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset;
use johnitvn\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PrdWorkSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'access';
?>

<div class="row">
    <div class="container">

        <hr/>
        <hr/>
        <?php
        foreach ($data as $item) {
            ?>

            <ul class="list-group">
                <li class="list-group-item active"><?php echo $item['projectName']; ?>

                    <?php
                    if ($item['group'] != true) {
                        ?>
                        (دسترسی اختصاصی)
                        <?php
                    }
                    ?>

                </li>

                <?php
                foreach ($item['level'] as $row) {

                    if (isset($row['name'])) {
                        ?>
                        <li class="list-group-item"><?php echo($row['name']); ?></li>

                        <?php
                    }
                }
                ?>
            </ul>

            <?php
        }
        ?>

    </div>
</div>