<?php

class UsuarioController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update','buscarUsuario','updateSenha'),
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

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Usuario;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        try{

            if (isset($_POST['Usuario'])) {

                $model->attributes = $_POST['Usuario'];

                $model->id_usuario = Yii::app()->user->id;
                $model->senha = md5($_POST['Usuario']['senha']);
                $model->isAdmin = $_POST['Usuario']['isAdmin'];
                $model->telefone = $_POST['Usuario']['telefone'];


                if($_POST['Usuario']['senha'] != $_POST['Usuario']['senha2']){
                    throw new Exception("As senha digitadas não são iguais");
                }

                if(!$this->checarEmail($model->email)){
                    throw new Exception("Este email já está cadastrado. Por favor informe um email diferente");
                }

                if ($model->save()){
                    $this->setFlashMessage('success',"Usuário cadastrado com uscesso");
                    $this->redirect(array('view', 'id' => $model->idUsuario));
                }

            }


        }
        catch(Exception $e){
            $this->setFlashMessage("error",$e->getMessage());
            $this->redirect(array('create',));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    private function checarEmail($email){
        $model= Usuario::model()->find('email = :email',array(':email'=>$email));

        if($model == null){
            return 1;
        }
        else{
            return 0;
        }

    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {

        try{
            $model = $this->loadModel($id);
            $model->confirmeSenha = $model->senha;

            // Uncomment the following line if AJAX validation is needed
            // $this->performAjaxValidation($model);

            if (isset($_POST['Usuario'])) {

                $model->attributes = $_POST['Usuario'];
                $model->telefone = $_POST['Usuario']['telefone'];
                $model->isAdmin = $_POST['Usuario']['isAdmin'];

                if ($model->save()) {
                    $this->setFlashMessage("success","Usuário atualizado com sucesso");
                    $this->redirect(array('view', 'id' => $model->idUsuario));
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

    public function actionUpdateSenha($id){
        try{

            $model = Usuario::model()->findByPk($id);
            if (isset($_POST['Usuario'])) {

                $senha = $_POST['Usuario']['senha'];
                $senha2 = $_POST['Usuario']['senha2'];

                if($senha != $senha2){
                    throw new Exception("As senhas são diferentes");
                }

                $model->senha = md5($senha);

                if ($model->save()) {
                    $this->setFlashMessage("success","Senha atualizada com sucesso");
                    $this->redirect(array('view', 'id' => $model->idUsuario));
                }
            }
        }
        catch(Exception $e){
            $this->setFlashMessage("error",$e->getMessage());
        }


        $this->render('updateSenha', array(
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
        $users = Usuario::model()->getAllUsers();
        $this->render('index', array(
            'users' => $users,
        ));
    }

    public function actionAdmin() {
        $model = new Usuario('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Usuario']))
            $model->attributes = $_GET['Usuario'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function loadModel($id) {
        $model = Usuario::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Usuario $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'usuario-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionBuscarUsuario(){

        if(isset($_POST['param'])){

            $param = $_POST['param'];
            $usuarios = Usuario::model()->buscarUsuarios($param);

            $this->render('index',array('users'=>$usuarios));

        }
        else{
            $this->redirect(array('index'));
        }
    }

}
