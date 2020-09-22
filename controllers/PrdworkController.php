<?php

namespace app\controllers;

use Yii;
use app\models\PrdWork;
use app\models\PrdWorkSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;

/**
 * PrdworkController implements the CRUD actions for PrdWork model.
 */
class PrdworkController extends Controller {

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
                'only' => ['create', 'update', 'index', 'delete'],
                'rules' => [
                    // deny all POST requests
                    [
                        'allow' => TRUE,
                        'verbs' => ['POST']
                    ],
                    // allow authenticated users
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                // everything else is denied
                ],
            ],
        ];
    }

    /**
     * Lists all PrdWork models.
     * @return mixed
     */
    public function actionIndex() {





        if (isset($_GET['PrdWorkSearch']['PERIOD'])) {
            $period = $_GET['PrdWorkSearch']['PERIOD'];


            $period = sprintf("%02d", $period);
            $s = $period - 1;
            if ($s == 0) {
                $s = 12;
            } else {

                $s = sprintf("%02d", $s);
            }
            $e = $period;
            $start = "$s/21";
            $end = "$e/20";
        } else {
            $s = "12";
            $start = "12/21";
            $end = "01/20";
        }
        $data = new \app\models\IOInfonew();


        if ($s == 12) {
            $array = [];
            $x = 0;
            $dataLastYear = new \app\models\IOInfo();
            $dataLastYear = $dataLastYear->find()->select('PERNO , count(PERNO) as count')->where(['>=', 'BEGINDATE', $start])->groupBy('PERNO')->asArray()->all();

            $data = $data->find()->select('PERNO , count(PERNO) as count')->where('BEGINDATE <= :end', [':end' => "$end"])->groupBy('PERNO')->asArray()->all();



            foreach ($dataLastYear as $itemLast) {

                $array[$x]['PERNO'] = (int) $itemLast['PERNO'];
                $array[$x]['count'] = $itemLast['count'];


                foreach ($data as $item) {


                    if ($item['PERNO'] == $itemLast['PERNO']) {
                        $array[$x]['count'] = $array[$x]['count'] + $item['count'];
                    }
                }
                $x++;
            }
        } else {

            $array = $data->find()->select('PERNO , count(PERNO) count')->where('BEGINDATE >= :id', [':id' => "$start"])->andWhere('BEGINDATE <= :end', [':end' => "$end"])->groupBy('PERNO')->asArray()->all();
        }


        $searchModel = new PrdWorkSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'dataResult' => $array,
        ]);
    }

    /**
     * Displays a single PrdWork model.
     * @param string $PERIOD
     * @param string $PERNO
     * @return mixed
     */
    public function actionView($PERIOD, $PERNO) {
        $request = Yii::$app->request;
        if ($request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'title' => "PrdWork #" . $PERIOD, $PERNO,
                'content' => $this->renderAjax('view', [
                    'model' => $this->findModel($PERIOD, $PERNO),
                ]),
                'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                Html::a('Edit', ['update', 'PERIOD, $PERNO' => $PERIOD, $PERNO], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
            ];
        } else {
            return $this->render('view', [
                        'model' => $this->findModel($PERIOD, $PERNO),
            ]);
        }
    }

    /**
     * Creates a new PrdWork model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $request = Yii::$app->request;
        $model = new PrdWork();

        if ($request->isAjax) {
            /*
             *   Process for ajax request
             */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet) {
                return [
                    'title' => "Create new PrdWork",
                    'content' => $this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                    Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])
                ];
            } else if ($model->load($request->post()) && $model->save()) {
                return [
                    'forceReload' => '#crud-datatable-pjax',
                    'title' => "Create new PrdWork",
                    'content' => '<span class="text-success">Create PrdWork success</span>',
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                    Html::a('Create More', ['create'], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
                ];
            } else {
                return [
                    'title' => "Create new PrdWork",
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
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'PERIOD' => $model->PERIOD, 'PERNO' => $model->PERNO]);
            } else {
                return $this->render('create', [
                            'model' => $model,
                ]);
            }
        }
    }

    /**
     * Updates an existing PrdWork model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param string $PERIOD
     * @param string $PERNO
     * @return mixed
     */
    public function actionUpdate($PERIOD, $PERNO) {
        $request = Yii::$app->request;
        $model = $this->findModel($PERIOD, $PERNO);

        if ($request->isAjax) {
            /*
             *   Process for ajax request
             */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet) {
                return [
                    'title' => "Update PrdWork #" . $PERIOD, $PERNO,
                    'content' => $this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                    Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])
                ];
            } else if ($model->load($request->post()) && $model->save()) {
                return [
                    'forceReload' => '#crud-datatable-pjax',
                    'title' => "PrdWork #" . $PERIOD, $PERNO,
                    'content' => $this->renderAjax('view', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                    Html::a('Edit', ['update', 'PERIOD, $PERNO' => $PERIOD, $PERNO], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
                ];
            } else {
                return [
                    'title' => "Update PrdWork #" . $PERIOD, $PERNO,
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
                return $this->redirect(['view', 'PERIOD' => $model->PERIOD, 'PERNO' => $model->PERNO]);
            } else {
                return $this->render('update', [
                            'model' => $model,
                ]);
            }
        }
    }

    /**
     * Delete an existing PrdWork model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $PERIOD
     * @param string $PERNO
     * @return mixed
     */
    public function actionDelete($PERIOD, $PERNO) {
        $request = Yii::$app->request;
        $this->findModel($PERIOD, $PERNO)->delete();

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
     * Delete multiple existing PrdWork model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $PERIOD
     * @param string $PERNO
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
     * Finds the PrdWork model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $PERIOD
     * @param string $PERNO
     * @return PrdWork the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($PERIOD, $PERNO) {
        if (($model = PrdWork::findOne(['PERIOD' => $PERIOD, 'PERNO' => $PERNO])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
