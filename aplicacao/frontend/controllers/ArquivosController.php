<?php

namespace frontend\controllers;

use Yii;
use app\models\Arquivos;
use app\models\ArquivosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * ArquivosController implements the CRUD actions for Arquivos model.
 */
class ArquivosController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
          'access' => [
            'class' => AccessControl::className(),
            'rules' => [
              [
                'actions' => ['index', 'create', 'update', 'error'],
                'allow' => true,
                'roles' => ['@'],
              ],
            ],
          ],
          'verbs' => [
              'class' => VerbFilter::className(),
              'actions' => [
                'delete' => ['POST'],
              ],
          ],
        ];
    }

    /**
     * Lists all Arquivos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArquivosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Arquivos model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Arquivos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Arquivos();
        $this->handleArquivoSave($model);

        return $this->render('create', [
          'model' => $model,
        ]);

        /*if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }*/
    }

    /**
     * Updates an existing Arquivos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $this->handleArquivoSave($model);

        return $this->render('update', [
          'model' => $model,
        ]);

        /*if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }*/
    }

    /**
     * Deletes an existing Arquivos model.
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
     * Finds the Arquivos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Arquivos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Arquivos::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function handleArquivoSave(Arquivos $model)
    {

      if ($model->load(Yii::$app->request->post())) {
        $model->upload = UploadedFile::getInstance($model, 'upload');

        if ($model->validate()) {
            if ($model->upload) {
                $filePath = 'uploads/' . $model->upload->baseName . '.' . $model->upload->extension;
                if ($model->upload->saveAs($filePath)) {
                    $model->arquivo = $filePath;
                    echo "Arquivo enviado com sucesso!";
                }
            }

            if ($model->save(false)) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
    }
}
}
