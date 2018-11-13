<?php

namespace frontend\controllers;

use Yii;
use app\models\Projeto;
use app\models\ProjetoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\ProjetoDetalhes;
use app\models\Atividades;
use kato\DropeZone;

/**
 * ProjetoController implements the CRUD actions for Projeto model.
 */
class ProjetoController extends Controller
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
                        'actions' => ['create', 'overview', 'error', 'detail', 'viewprofessor', 'aprova', 'upload'],
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
     * Creates a new Projeto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Projeto();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if ($model->criadetalhes($model->id_projeto, 1)){
                return $this->redirect(['modaluno/index']);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Action Aprova etapa do projeto
     * @return mixed
     */
    public function actionAprova($id_projeto, $id_atividade)
    {
        $model = new Projeto();
        $aux = $id_atividade;

        $model->aprovaProjeto($id_projeto, $aux);
        return $this->redirect(['modprofessor/index']);

        /*if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if ($model->aprovaProjeto($model->id_projeto)){
                return $this->redirect('viewprofessor', ['model' => $this->findModel($id_projeto)]);
            }
        } /*else {
            return $this->render('aprova', [
                'model' => $model,
            ]);
        }*/
    }


    /**
     * View de Projeto do usuário Professor.
     *
     * @return mixed
     */
    public function actionViewprofessor($id_projeto)
    {
        $model = new Projeto();

        return $this->render('viewprofessor', ['model' => $this->findModel($id_projeto)]);
    }

        /**
     * Finds the Projeto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_projeto
     * @return Projeto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */

     /**
     * Displays homepage.
     *
     * @return mixed
     */
     public function actionOverview($id_projeto)
     {
       $model = new Projeto();
       return $this->render('overview', ['model' => $this->findModel($id_projeto)]);
     }

    protected function findModel($id)
    {
        if (($model = Projeto::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionDetail($id_projeto)
    {
        return $this->render('detail', ['model' => $this->findModel($id_projeto)]);
    }

    public function actionUpload()
    {
        $fileName = 'file';
        $uploadPath = 'uploads';

        if (isset($_FILES[$fileName])) {
            $file = \yii\web\UploadedFile::getInstanceByName($fileName);

            //Print file data
            //print_r($file);

            if ($file->saveAs($uploadPath . '/' . $file->name)) {
                //Now save file data to database

                echo \yii\helpers\Json::encode($file);
            }
        }
        return false;
        
    }

}
