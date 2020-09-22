<?php

namespace app\controllers;

use app\models\Person;
use app\models\User;
use app\models\Profile;
use Yii;

class ImportController extends \yii\web\Controller {

    public function actionIndex() {

        ini_set('max_execution_time', 300); //300
        set_time_limit(300);
        $db4 = new Person();
        $data = $db4->find()->select('*')->leftJoin('webSection', 'webSection.perno = person.PERNO')->asArray()->all();


        foreach ($data as $item) {
            $modelUser = New User();
            $personalID = ((int) $item['PERNO']);

            $modelUser->username = $personalID;
            $modelUser->auth_key = Yii::$app->security->generateRandomString();
            $modelUser->created_at = time();
            $modelUser->updated_at = time();
            $modelUser->password_hash = Yii::$app->getSecurity()->generatePasswordHash($personalID);
            $modelUser->email = $modelUser->username;
            $modelUser->save(false);


            $profileModel = new Profile;
            $profileModel->name = $item['FIRSTNAME'];
            $profileModel->personal_code = $personalID;
            $profileModel->last_name = $item['LASTNAME'];
            $profileModel->userID = $modelUser->id;
            $profileModel->save(false);
        }
    }

    public function actionSection() {


        $allPerson = \app\models\Rrule::find()->asArray()->all();

        $workCat = \app\models\WorkCategory::find()->asArray()->all();
// Using the $records array from Example #1
        $overite = array_column($workCat, 'id', 'code_category');
        $connection = Yii::$app->db;
        foreach ($allPerson as $person) {
            $personalID = (int) $person['PERNO'];
            $sectionBefore = trim($person['SECTION']);

            $sectionAfter = $overite["$sectionBefore"];
            $connection->createCommand()
                    ->update('profile', ['category_workID' => $sectionAfter], "personal_code = $personalID")
                    ->execute();
        }
    }

}
