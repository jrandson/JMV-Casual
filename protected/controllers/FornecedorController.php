<?php

class FornecedorController extends Controller {

    public $layout = '//layouts/column2';

    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('index','create', 'update','buscarFornecedor'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    public function actionCreate() {

        try{
            $model = new Fornecedor;

            // Uncomment the following line if AJAX validation is needed
            // $this->performAjaxValidation($model);

            if (isset($_POST['Fornecedor'])) {

                $model->attributes = $_POST['Fornecedor'];
                $model->id_usuario = Yii::app()->user->id;
                $model->observacao = $_POST['Fornecedor']['observacao'];
                $model->responsavel = $_POST['Fornecedor']['responsavel'];

                if ($model->save()) {
                    $this->setFlashMessage("success","Fornecedor cadastrado com sucesso");
                    $this->redirect(array('view', 'id' => $model->idFornecedor));
                }
            }

        }
        catch(Exception $e){
            $this->setFlashMessage("error",$e->getMessage());
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    public function actionUpdate($id) {

        try{
            $model = $this->loadModel($id);

            // Uncomment the following line if AJAX validation is needed
            // $this->performAjaxValidation($model);

            if (isset($_POST['Fornecedor'])) {
;
                $model->attributes = $_POST['Fornecedor'];
                $model->observacao = $_POST['Fornecedor']['observacao'];
                $model->responsavel = $_POST['Fornecedor']['responsavel'];

                if ($model->save()) {
                    $this->setFlashMessage("success","Fornecedor atualizado com sucesso.");
                    $this->redirect(array('view', 'id' => $model->idFornecedor));
                }
            }

        }
        catch(Exception $e){
            $this->setFlashMessage("error",$e->getMessage());
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    public function actionIndex() {
        $fornecedores = Fornecedor::model()->getAllForncedores();
        $this->render('index', array(
            'forncedores'=>$fornecedores,
        ));
    }

    public function actionAdmin() {
        $model = new Fornecedor('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Fornecedor']))
            $model->attributes = $_GET['Fornecedor'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function loadModel($id) {
        $model = Fornecedor::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'fornecedor-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionBuscarFornecedor(){

        if(isset($_POST['param'])){
            $param = $_POST['param'];
            $query = Fornecedor::model()->buscarFornecedor($param);
            $this->render('index', array(
                'forncedores'=>$query,
            ));
        }
        else{
            $this->redirect(array('index'));
        }

    }
}
