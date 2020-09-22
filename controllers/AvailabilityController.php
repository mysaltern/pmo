<?php

namespace app\controllers;

use Yii;
use app\models\Availability;
use app\models\AvailabilitySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;

/**
 * AvailabilityController implements the CRUD actions for Availability model.
 */
class AvailabilityController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'bulk-delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                //  'only' => ['create', 'access', 'all_access', 'update', 'index', 'delete'],
                'rules' => [
                    // deny all POST requests
                    [
                        'actions' => ['all_access'],
                        'allow' => true,
                    ],
                    // allow authenticated users
                    [
                        // 'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                // everything else is denied
                ],
                'denyCallback' => function ($rule, $action) {
            Yii::$app->session->setFlash('access', 'You have to complete this section first');
            $this->redirect(\yii\helpers\Url::to(['site/index']));
        },
            ],
        ];
    }

    /**
     * Lists all Availability models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new AvailabilitySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Availability model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        $request = Yii::$app->request;
        if ($request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'title' => "Availability #" . $id,
                'content' => $this->renderAjax('view', [
                    'model' => $this->findModel($id),
                ]),
                'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                Html::a('Edit', ['update', 'id' => $id], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
            ];
        } else {
            return $this->render('view', [
                        'model' => $this->findModel($id),
            ]);
        }
    }

    /**
     * Creates a new Availability model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $request = Yii::$app->request;
        $model = new Availability();

        if ($request->isAjax) {
            /*
             *   Process for ajax request
             */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet) {
                return [
                    'title' => "Create new Availability",
                    'content' => $this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                    Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])
                ];
            } else if ($model->load($request->post())) {


                if (isset($_GET['type'])) {
                    $model->type = 1;
                } else {
                    $model->type = 2;
                }

                $model->save();
                return [
                    'forceReload' => '#crud-datatable-pjax',
                    'title' => "Create new Availability",
                    'content' => '<span class="text-success">Create Availability success</span>',
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                    Html::a('Create More', ['create'], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
                ];
            } else {
                return [
                    'title' => "Create new Availability",
                    'content' => $this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                    Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])
                ];
            }
        } else {
            /*
             *   Process for non-ajax request
             */
            if ($model->load($request->post())) {

                if (isset($_GET['type'])) {
                    $model->type = 1;
                } else {
                    $model->type = 2;
                }

                $model->save();

                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                            'model' => $model,
                ]);
            }
        }
    }

    /**
     * Updates an existing Availability model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $request = Yii::$app->request;
        $model = $this->findModel($id);

        if ($request->isAjax) {
            /*
             *   Process for ajax request
             */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet) {
                return [
                    'title' => "Update Availability #" . $id,
                    'content' => $this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                    Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])
                ];
            } else if ($model->load($request->post()) && $model->save()) {
                return [
                    'forceReload' => '#crud-datatable-pjax',
                    'title' => "Availability #" . $id,
                    'content' => $this->renderAjax('view', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                    Html::a('Edit', ['update', 'id' => $id], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
                ];
            } else {
                return [
                    'title' => "Update Availability #" . $id,
                    'content' => $this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                    Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])
                ];
            }
        } else {
            /*
             *   Process for non-ajax request
             */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('update', [
                            'model' => $model,
                ]);
            }
        }
    }

    /**
     * Delete an existing Availability model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $request = Yii::$app->request;
        $this->findModel($id)->delete();

        if ($request->isAjax) {
            /*
             *   Process for ajax request
             */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose' => true, 'forceReload' => '#crud-datatable-pjax'];
        } else {
            /*
             *   Process for non-ajax request
             */
            return $this->redirect(['index']);
        }
    }

    /**
     * Delete multiple existing Availability model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionBulkDelete() {
        $request = Yii::$app->request;
        $pks = explode(',', $request->post('pks')); // Array or selected records primary keys
        foreach ($pks as $pk) {
            $model = $this->findModel($pk);
            $model->delete();
        }

        if ($request->isAjax) {
            /*
             *   Process for ajax request
             */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose' => true, 'forceReload' => '#crud-datatable-pjax'];
        } else {
            /*
             *   Process for non-ajax request
             */
            return $this->redirect(['index']);
        }
    }

    /**
     * Finds the Availability model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Availability the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Availability::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    // THE CONTROLLER
    public function actionSubcat() {

        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $cat_id = $parents[0];
                $out = self::getSubCatList($cat_id);
                // the getSubCatList function will query the database based on the
                // cat_id and return an array like below:
                // [
                //    ['id'=>'<sub-cat-id-1>', 'name'=>'<sub-cat-name1>'],
                //    ['id'=>'<sub-cat_id_2>', 'name'=>'<sub-cat-name2>']
                // ]
                return ['output' => $out, 'selected' => ''];
            }
        }
        return ['output' => '', 'selected' => ''];
    }

    private function getSubCatList($cat_id) {

        $items = \app\models\LevelProject::getWtihProject($cat_id);
        return $items;
    }

    public function actionAll_access() {


        if (Yii::$app->user->isGuest) {
            return $this->redirect(['user/login']);
        }


        $userID = Yii::$app->user->id;
        $accessCheck = \app\models\Profile::information($userID);



        $profileID = $accessCheck[0]['profileID'];



        $data = \app\models\LevelProject::getAccess($profileID, $accessCheck);


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


        return $this->render('allAccess', [
                    'data' => $arr,
        ]);
    }

    public function actionAccess() {

        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $cat_id = $parents[0];
                $out = self::getSubLevel($cat_id);
                // the getSubCatList function will query the database based on the
                // cat_id and return an array like below:
                // [
                //    ['id'=>'<sub-cat-id-1>', 'name'=>'<sub-cat-name1>'],
                //    ['id'=>'<sub-cat_id_2>', 'name'=>'<sub-cat-name2>']
                // ]
                return ['output' => $out, 'selected' => ''];
            }
        }
        return ['output' => '', 'selected' => ''];
    }

    private function getSubLevel($cat_id) {


//        $items = \app\models\LevelProject::getWtihProject($cat_id);
//        var_dump($items);
//        die;
        $userID = 6;
        $accessCheck = \app\models\Profile::information($userID);

        $profileID = $accessCheck[0]['profileID'];

        $data = \app\models\LevelProject::getAccess($profileID, $accessCheck, $cat_id);

        $arr = [];
        $x = -1;
        foreach ($data as $item) {
            $x++;

            if (isset($item['level'])) {
                $arr[$x] = ['id' => $item['level'], 'name' => $item['level_name']];
            } else {
                $allLevel = \app\models\LevelProject::find()->where(['projectID' => $cat_id])->asArray()->all();


                foreach ($allLevel as $row) {
                    //      $arr = $arr + [$row['id'] => $row['name']];

                    $arr[$x] = ['id' => $row['id'], 'name' => $row['name']];
                    $x++;
                }
            }
        }





        return($arr);
    }

}
