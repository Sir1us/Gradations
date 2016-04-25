<?php

namespace backend\controllers;

use Yii;
use backend\models\Gradations;
use backend\models\GradationsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GradationsController implements the CRUD actions for Gradations model.
 */
class GradationsController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Gradations models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GradationsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Gradations model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model=$this->findModel($id);
        $decodeJson=json_decode($model->text_info, true);

        return $this->render('view', [
                'model' => $model,
                'text_info'=> $decodeJson,
            ]);
    }

    /**
     * Creates a new Gradations model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        // указываем условия что будет происходить если в post что то есть
        $model = new Gradations();
        if(Yii::$app->request->post()) {
            $post = Yii::$app->request->post();
            $post = $post['Gradations'];
            $onerecord = new \stdClass();
            $onerecord->ids = [];

            // перебор ids

            $nkeys = array_keys($post['gradations']);
            foreach ($post['ids'] as $nkeys => $val) {
                $ids = $post['ids'][$nkeys];
                array_push($onerecord->ids, $ids);
            }   

            //преобразование данных в json код и перебераем их

            $newkeys = array_keys($post['gradations']);
            foreach ($post['gradations'] as $newkeys => $value) {
                $gr1 = new \stdClass();
                $gr1->price = $post['gradations'][$newkeys]['price'];
                $gr1->from = $post['gradations'][$newkeys]['from'];
                $gr1->to = $post['gradations'][$newkeys]['to'];
                $onerecord->gradations[] = $gr1;
                $jsonText = json_encode($onerecord);
            }
                $finalData = ['Gradations' => [
                    'id' => $post['id'],
                    'text_info' => $jsonText,
                    ]
                ];
                //загрузка конечного вида данных и сохранение их
                if ($model->load($finalData) && ($model->save()))  {
                        return $this->render('view', [
                            'model' => $model,
                            'id' => $model->id,
                            'text_info' => json_decode($model->text_info, true),
                            'ids' => $post['ids'],
                        ]);
                }
        } else {
            return $this->render('create', [
                'model'  => $model,
            ]);
        }
    }

    /**
     * Updates an existing Gradations model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        // отображение данных в input  при update
        $model = $this->findModel($id);
        $b=$model->text_info;

        // пример описания как в actionCreate

        if(Yii::$app->request->post()) {

            $posts = Yii::$app->request->post();


            $posts = $posts['Gradations'];
            $onerecords = new \stdClass();
            $onerecords->ids = [];

            $nkeys = array_keys($posts['gradations']);
            foreach ($posts['ids'] as $nkeys => $val) {
                $ids = $posts['ids'][$nkeys];
                array_push($onerecords->ids, $ids);

            }
            $newkeys = array_keys($posts['gradations']);
            foreach ($posts['gradations'] as $newkeys => $value) {
                $gr2 = new \stdClass();
                $gr2->price = $posts['gradations'][$newkeys]['price'];
                $gr2->from = $posts['gradations'][$newkeys]['from'];
                $gr2->to = $posts['gradations'][$newkeys]['to'];
                $onerecords->gradations[] = $gr2;
                $jsonText = json_encode($onerecords);
            }

            $finalData = ['Gradations' => [
                'id' => $posts['id'],
                'text_info' => $jsonText,
                ]
            ];

            if ($model->load($finalData) && ($model->save())) {
                    return $this->render('view', [
                        'model' => $model,
                        'id' => $model->id,
                        'text_info' => json_decode($jsonText, true),
                    ]);
            }
        } else {
            $b = json_decode($b, true);
            return $this->render('update', [
                'model' => $model,
                'b' => $b
            ]);
        }
    }

    /**
     * Deletes an existing Gradations model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Gradations model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Gradations the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Gradations::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
