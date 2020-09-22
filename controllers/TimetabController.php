<?php

namespace app\controllers;

use Yii;
use app\models\TimeTab;
use app\models\TimeTabSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;

/**
 * TimetabController implements the CRUD actions for TimeTab model.
 */
class TimetabController extends Controller {

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
     * Lists all TimeTab models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new TimeTabSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TimeTab model.
     * @param string $BEGINDATE
     * @param string $BEGINTIME
     * @param string $CALCDATE
     * @param string $PerNo
     * @param string $STATUS
     * @return mixed
     */
    public function actionView($BEGINDATE, $BEGINTIME, $CALCDATE, $PerNo, $STATUS) {
        $request = Yii::$app->request;
        if ($request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'title' => "TimeTab #" . $BEGINDATE, $BEGINTIME, $CALCDATE, $PerNo, $STATUS,
                'content' => $this->renderAjax('view', [
                    'model' => $this->findModel($BEGINDATE, $BEGINTIME, $CALCDATE, $PerNo, $STATUS),
                ]),
                'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                Html::a('Edit', ['update', 'BEGINDATE, $BEGINTIME, $CALCDATE, $PerNo, $STATUS' => $BEGINDATE, $BEGINTIME, $CALCDATE, $PerNo, $STATUS], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
            ];
        } else {
            return $this->render('view', [
                        'model' => $this->findModel($BEGINDATE, $BEGINTIME, $CALCDATE, $PerNo, $STATUS),
            ]);
        }
    }

    /**
     * Creates a new TimeTab model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $request = Yii::$app->request;
        $model = new TimeTab();

        if ($request->isAjax) {
            /*
             *   Process for ajax request
             */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet) {
                return [
                    'title' => "Create new TimeTab",
                    'content' => $this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                    Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])
                ];
            } else if ($model->load($request->post()) && $model->save()) {
                return [
                    'forceReload' => '#crud-datatable-pjax',
                    'title' => "Create new TimeTab",
                    'content' => '<span class="text-success">Create TimeTab success</span>',
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                    Html::a('Create More', ['create'], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
                ];
            } else {
                return [
                    'title' => "Create new TimeTab",
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
                return $this->redirect(['view', 'BEGINDATE' => $model->BEGINDATE, 'BEGINTIME' => $model->BEGINTIME, 'CALCDATE' => $model->CALCDATE, 'PerNo' => $model->PerNo, 'STATUS' => $model->STATUS]);
            } else {
                return $this->render('create', [
                            'model' => $model,
                ]);
            }
        }
    }

    /**
     * Updates an existing TimeTab model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param string $BEGINDATE
     * @param string $BEGINTIME
     * @param string $CALCDATE
     * @param string $PerNo
     * @param string $STATUS
     * @return mixed
     */
    public function actionUpdate($BEGINDATE, $BEGINTIME, $CALCDATE, $PerNo, $STATUS) {
        $request = Yii::$app->request;
        $model = $this->findModel($BEGINDATE, $BEGINTIME, $CALCDATE, $PerNo, $STATUS);

        if ($request->isAjax) {
            /*
             *   Process for ajax request
             */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet) {
                return [
                    'title' => "Update TimeTab #" . $BEGINDATE, $BEGINTIME, $CALCDATE, $PerNo, $STATUS,
                    'content' => $this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                    Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])
                ];
            } else if ($model->load($request->post()) && $model->save()) {
                return [
                    'forceReload' => '#crud-datatable-pjax',
                    'title' => "TimeTab #" . $BEGINDATE, $BEGINTIME, $CALCDATE, $PerNo, $STATUS,
                    'content' => $this->renderAjax('view', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                    Html::a('Edit', ['update', 'BEGINDATE, $BEGINTIME, $CALCDATE, $PerNo, $STATUS' => $BEGINDATE, $BEGINTIME, $CALCDATE, $PerNo, $STATUS], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
                ];
            } else {
                return [
                    'title' => "Update TimeTab #" . $BEGINDATE, $BEGINTIME, $CALCDATE, $PerNo, $STATUS,
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
                return $this->redirect(['view', 'BEGINDATE' => $model->BEGINDATE, 'BEGINTIME' => $model->BEGINTIME, 'CALCDATE' => $model->CALCDATE, 'PerNo' => $model->PerNo, 'STATUS' => $model->STATUS]);
            } else {
                return $this->render('update', [
                            'model' => $model,
                ]);
            }
        }
    }

    /**
     * Delete an existing TimeTab model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $BEGINDATE
     * @param string $BEGINTIME
     * @param string $CALCDATE
     * @param string $PerNo
     * @param string $STATUS
     * @return mixed
     */
    public function actionDelete($BEGINDATE, $BEGINTIME, $CALCDATE, $PerNo, $STATUS) {
        $request = Yii::$app->request;
        $this->findModel($BEGINDATE, $BEGINTIME, $CALCDATE, $PerNo, $STATUS)->delete();

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
     * Delete multiple existing TimeTab model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $BEGINDATE
     * @param string $BEGINTIME
     * @param string $CALCDATE
     * @param string $PerNo
     * @param string $STATUS
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
     * Finds the TimeTab model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $BEGINDATE
     * @param string $BEGINTIME
     * @param string $CALCDATE
     * @param string $PerNo
     * @param string $STATUS
     * @return TimeTab the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($BEGINDATE, $BEGINTIME, $CALCDATE, $PerNo, $STATUS) {
        if (($model = TimeTab::findOne(['BEGINDATE' => $BEGINDATE, 'BEGINTIME' => $BEGINTIME, 'CALCDATE' => $CALCDATE, 'PerNo' => $PerNo, 'STATUS' => $STATUS])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
