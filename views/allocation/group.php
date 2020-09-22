<?php

use hoomanMirghasemi\jdf\Jdf;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Group Insert';
$jdf = 1;
$startDate = $time;

$next = $startDate + (7 * 86400);
$previous = $startDate - (7 * 86400);
?>


<h2>وارد کردن گروهی کارکرد</h2>

<?php $form = ActiveForm::begin(); ?>


<div class="card text-center">
    <div class=" ">
        <a href="<?php echo Url::to(['allocation/group', 'endDate' => $previous]); ?>" class="previous">&laquo; هفته قبل</a>
        <a href="<?php echo Url::to(['allocation/group', 'endDate' => $next]); ?>" class="next">هفته بعد  &raquo;</a>

    </div>
</div>



<?php ActiveForm::end(); ?>

<?php if (Yii::$app->session->hasFlash('percent')): ?>
    <div class="alert alert-warning alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>

        <?= Yii::$app->session->getFlash('percent') ?>
    </div>
<?php endif; ?>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>نام پروژه</th>

                <th>فاز</th>
                <th><?php echo Jdf::jdate('Y/n/j', $startDate); ?></th>
                <th><?php echo Jdf::jdate('Y/n/j', $startDate - 86400); ?></th>
                <th><?php echo Jdf::jdate('Y/n/j', $startDate - 86400 * 2); ?></th>
                <th><?php echo Jdf::jdate('Y/n/j', $startDate - 86400 * 3); ?></th>
                <th><?php echo Jdf::jdate('Y/n/j', $startDate - 86400 * 4); ?></th>
                <th><?php echo Jdf::jdate('Y/n/j', $startDate - 86400 * 5); ?></th>
                <th><?php echo Jdf::jdate('Y/n/j', $startDate - 86400 * 6); ?></th>
            </tr> 
        </thead>
        <tbody>
        <form method="post" action="#">

            <input name="endTime" type="hidden" value="<?= $startDate; ?>"/>
            <?php
            $x = 0;
            foreach ($data as $item) {
                $day = [];
                $x = 0;
                foreach ($defaultData as $row) {
                    $x++;
                    if ($row['level_projectID'] == $item['level']) {
                        $temp = $row['date'];
                        $temp = substr($temp, 0, 10);
                        $temp = explode("-", $temp);
                        $temp = jdf::jalali_to_gregorian($temp[0], $temp[1], $temp[2]);
                        $your_date = strtotime("$temp[0]-$temp[1]-$temp[2]");
                        $datediff = $startDate - $your_date;
                        $day[round($datediff / (60 * 60 * 24))] = $row['percent'];
                    }
                }

                $nameFeild = "percent" . $item['level'];
                $x++;
                ?>
                <tr>
                    <td>  <?php echo $x; ?></td>
                    <td>  <?php echo $item['name']; ?></td>
                    <td>  <?php echo $item['level_name']; ?></td>
                    <td> <input class="small" name="<?php echo $nameFeild; ?>[]" type="number" value="<?php
                        if (isset($day[1])) {
                            echo($day[1]);
                        } else {
                            echo 0;
                        }
                        ?>"   />  </td>
                    <td> <input class="small" name="<?php echo $nameFeild; ?>[]" type="number" value="<?php
                        if (isset($day[2])) {
                            echo($day[2]);
                        } else {
                            echo 0;
                        }
                        ?>"   />  </td>
                    <td> <input class="small" name="<?php echo $nameFeild; ?>[]" type="number" value="<?php
                        if (isset($day[3])) {
                            echo($day[3]);
                        } else {
                            echo 0;
                        }
                        ?>"   />  </td>
                    <td> <input class="small" name="<?php echo $nameFeild; ?>[]" type="number" value="<?php
                        if (isset($day[4])) {
                            echo($day[4]);
                        } else {
                            echo 0;
                        }
                        ?>"   />  </td>
                    <td> <input class="small" name="<?php echo $nameFeild; ?>[]" type="number" value="<?php
                        if (isset($day[5])) {
                            echo($day[5]);
                        } else {
                            echo 0;
                        }
                        ?>"   />  </td>
                    <td> <input class="small"  name="<?php echo $nameFeild; ?>[]" type="number" value="<?php
                        if (isset($day[6])) {
                            echo($day[6]);
                        } else {
                            echo 0;
                        }
                        ?>"   />  </td>
                    <td> <input class="small"  name="<?php echo $nameFeild; ?>[]" type="number" value="<?php
                        if (isset($day[7])) {
                            echo($day[7]);
                        } else {
                            echo 0;
                        }
                        ?>"   />  </td>
                </tr>
                <?php
            }
            ?>
            <hr/>
            <br/>

            <input class="btn btn-info" type="submit" value='ثبت' />
        </form>

        </tbody>
    </table>
</div>

</main>
</div>
</div>