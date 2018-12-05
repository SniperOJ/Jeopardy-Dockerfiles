<?php

namespace app\controllers;

use Yii;
use app\models\Users;
use app\models\UsersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UploadForm;
use yii\web\UploadedFile;

/**
 * UsersController implements the CRUD actions for Users model.
 */
class UsersController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Users models.
     * @return mixed
     */
    // public function actionIndex()
    // {
    //     $searchModel = new UsersSearch();
    //     $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

    //     return $this->render('index', [
    //         'searchModel' => $searchModel,
    //         'dataProvider' => $dataProvider,
    //     ]);
    // }

    /**
     * Displays a single Users model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    // public function actionView($id)
    // {
    //     return $this->render('view', [
    //         'model' => $this->findModel($id),
    //     ]);
    // }

    /**
     * Creates a new Users model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Users();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['login']);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Users model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
//    public function actionUpdate($id)
//    {
//        $model = $this->findModel($id);
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        }
//
//        return $this->render('update', [
//            'model' => $model,
//        ]);
//    }

    /**
     * Deletes an existing Users model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
//    public function actionDelete($id)
//    {
//        $this->findModel($id)->delete();
//
//        return $this->redirect(['index']);
//    }

    /**
     * Finds the Users model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Users the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Users::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new Users();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            Yii::$app->session->set('islogin',1);
            Yii::$app->session->set('username',$model->username);
            Yii::$app->session->set('id',$model->id);
            return $this->redirect(['site/index']);
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout(){
        Yii::$app->session->removeAll();
        return $this->redirect(['site/index']);
    }

    public function actionFile()
    {
        if (!Yii::$app->session->get('id')) {
            return $this->redirect(['site/index']);
        }
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            $model->name = Yii::$app->request->post('UploadForm')['name'];
            if ($path = $model->upload()) {
                $filename = $path;
                $sql = 'update users set filepath = \''.$filename.'\' where id = '.Yii::$app->session->get('id');
                Yii::$app->db->createCommand($sql)->execute();
                \Yii::$app->getSession()->setFlash('success', "File upload Success! path is ../uploads/".$model->name.'.'.$model->imageFile->extension);
                return $this->render('file', ['model' => $model]);
            }
        }

        return $this->render('file', ['model' => $model]);
    }

    public function actionShow(){
        if (!Yii::$app->session->get('id')) {
            return $this->redirect(['site/index']);
        }
        $model = Users::find()->where(['id'=>Yii::$app->session->get('id')])->one();
        if (!$model->filepath){
            \Yii::$app->getSession()->setFlash('error', "You should upload your image first");
            return $this->redirect(['file']);
        }
        if (substr($model->filepath, 0,7)=='phar://') {
            \Yii::$app->getSession()->setFlash('error', "no phar! ");
            return $this->redirect(['file']);
        }
        $content = @file_get_contents($model->filepath);
        header("Content-Type: image/jpeg;text/html; charset=utf-8");
        echo $content;
        exit;
    }
}
