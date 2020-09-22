<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\components;

use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;

class MyComponent extends Component {

    public function convertTime($time, $format = '%02d:%02d') {

        if ($time < 1) {
            return '00:00';
        }
        $hours = floor($time / 60);
        $minutes = ($time % 60);
        return sprintf($format, $hours, $minutes);
    }

    public function count() {
        
    }

    public function arrayForAccess($data) {
        $arr = [];
        $x = 0;

        foreach ($data as $item) {
            $arr[$x]['group'] = $item['group'];
            $arr[$x]['projectID'] = $item['project'];
            $arr[$x]['projectName'] = $item['name'];
            if (isset($item['level'])) {

                $arr[$x]['level'][] = ['id' => $item['level'], 'name' => $item['level_name']];
            } else {
                $allLevel = \app\models\LevelProject::find()->where(['projectID' => $item['project']])->asArray()->all();

                foreach ($allLevel as $row) {
                    //      $arr = $arr + [$row['id'] => $row['name']];

                    $arr[$x]['level'][] = ['id' => $row['id'], 'name' => $row['name']];
                }
            }
            $x++;
        }


        return $arr;
    }

    public function convertPersianNumbersToEnglish($input) {
        $persian = ['۰', '۱', '۲', '۳', '۴', '٤', '۵', '٥', '٦', '۶', '۷', '۸', '۹'];
        $english = [ 0, 1, 2, 3, 4, 4, 5, 5, 6, 6, 7, 8, 9];
        return str_replace($persian, $english, $input);
    }

}
