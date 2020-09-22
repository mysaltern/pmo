<?php

namespace app\controllers;

use Yii;
use app\models\AllocationDetail;
use app\models\AllocationDetailSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use hoomanMirghasemi\jdf\Jdf;
use yii\filters\AccessControl;
use app\models\Allocation;

/**
 * AllocationController implements the CRUD actions for AllocationDetail model.
 */
class AllocationController extends Controller {

    public $enableCsrfValidation = false;

    /**
     * {@inheritdoc}
     */

    /** @inheritdoc */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    ['allow' => true, 'actions' => ['group'], 'roles' => ['@']],
//                    ['allow' => true, 'actions' => ['show'], 'roles' => ['?', '@']],
                ],
            ],
        ];
    }

    /**
     * Lists all AllocationDetail models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new AllocationDetailSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionReport() {

        $userID = \Yii::$app->user->id;


        return $this->render('report', [
//                    'model' => $this->findModel($id),
        ]);
    }

    public function actionGroup() {



        $userID = \Yii::$app->user->id;
        $accessCheck = \app\models\Profile::information($userID);

        $profileID = $accessCheck[0]['profileID'];

        if (isset($_GET['endDate'])) {
            $timeDefault = $_GET['endDate'];
        } else {
            $timeDefault = time();
        }



        $limit = 7;
        $endTime = $timeDefault;


        $data = \app\models\LevelProject::getAccess($profileID, $accessCheck);

        if (isset($_POST)) {

            if ($_POST != null) {

                $infomation = $_POST;

                $endTime = $infomation['endTime'];

                unset($infomation["endTime"]);
                $sumArray = array();

                foreach ($infomation as $k => $subArray) {
                    foreach ($subArray as $id => $value) {
                        if (isset($sumArray[$id])) {
                            $sumArray[$id] = $sumArray[$id] + $value;
                        } else {
                            $sumArray[$id] = $value;
                        }
                    }
                }
                foreach ($sumArray as $checkPercent) {
                    if ($checkPercent > 100) {
                        Yii::$app->session->setFlash('percent', 'درصد یک یا چند روز بیشتر از ۱۰۰ وارد شده است.');
                        $defaultData = Allocation::getWithConditionDetails($endTime, $limit, $profileID);

                        return $this->render('group', [
                                    'data' => $data,
                                    'defaultData' => $defaultData,
                                    'time' => $timeDefault,
                        ]);
                    }
                }

                foreach ($infomation as $key => $value) {


                    $levelProjectID = str_replace('percent', '', $key);
                    $t = 0;

                    foreach ($value as $column) {

                        $t = $t + 1;

                        if ($column !== '0') {



                            $day = Jdf::jdate('Y-n-j', $endTime - ($t * 86400));


                            $day = Yii::$app->mycomponent->convertPersianNumbersToEnglish($day);


                            $check = \app\models\Allocation::getWithCondition($profileID, $day);


                            if (isset($check['id'])) {
                                $idAllocation = $check['id'];
                            } else {

                                $time = date('H:i:s');
                                $allocation = new \app\models\Allocation;
                                $allocation->date = $day . " $time";
                                $allocation->profileID = $profileID;
                                $allocation->save(false);
                                $idAllocation = $allocation->id;
                            }

                            $checkExist = AllocationDetail::checkExist($levelProjectID, $idAllocation);


                            if ($checkExist != false) {
                                $model = AllocationDetail::findOne($checkExist);
                                $model->percent = $column;
                                $status = $model->save(false);
                            } else {
                                $model = new AllocationDetail();
                                $model->level_projectID = $levelProjectID;
                                $model->percent = $column;
                                $model->allocationID = $idAllocation;
                                $status = $model->save(false);
                            }
                        }
                    }
                }
            }
        }


        $model = new Allocation;
        if (isset($_GET['endDate'])) {
            $endTime = $_GET['endDate'];
        }

        $defaultData = Allocation::getWithConditionDetails($endTime, $limit, $profileID);

        return $this->render('group', [
                    'data' => $data,
                    'model' => $model,
                    'defaultData' => $defaultData,
                    'time' => $timeDefault,
        ]);
    }

    /**
     * Displays a single AllocationDetail model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new AllocationDetail model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new AllocationDetail();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing AllocationDetail model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing AllocationDetail model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AllocationDetail model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AllocationDetail the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = AllocationDetail::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
