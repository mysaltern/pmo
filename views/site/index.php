<?php
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <?php if (Yii::$app->session->hasFlash('access')): ?>
        <hr/>
        <br/>
        <div class="alert alert-danger alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>

            <?= Yii::$app->session->getFlash('access') ?>
        </div>
    <?php endif; ?>

</div>
