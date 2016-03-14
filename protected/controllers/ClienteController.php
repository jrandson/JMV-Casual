<?php

class ClienteController extends Controller {

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
                'actions' => array('create', 'update','historico','buscarCliente'),
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
        $model = $this->loadModel($id);
        $debitos =  $model->getDebitos();

        $this->render('view', array(
            'model' => $model,
            'debitos'=>$debitos,
        ));
    }
    

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Cliente;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Cliente'])) {

            $model->nome = $_POST['Cliente']['nome'];
            $model->email = $_POST['Cliente']['email'];
            $model->telefone = $_POST['Cliente']['telefone'];
            $model->rg = $_POST['Cliente']['rg'];
            $model->cpf = $_POST['Cliente']['cpf'];
            $model->endereco = $_POST['Cliente']['endereco'];

            $model->id_usuario = Yii::app()->user->id;

            if ($model->save())
                $this->redirect(array('view', 'id' => $model->idCliente));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Cliente'])) {

            $model->nome = $_POST['Cliente']['nome'];
            $model->email = $_POST['Cliente']['email'];
            $model->telefone = $_POST['Cliente']['telefone'];
            $model->rg = $_POST['Cliente']['rg'];
            $model->cpf = $_POST['Cliente']['cpf'];
            $model->endereco = $_POST['Cliente']['endereco'];

            if ($model->save())
                $this->redirect(array('view', 'id' => $model->idCliente));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Cliente');
        $clientes = Cliente::model()->getAll();
        $total = Cliente::model()->getTotal();

        $this->render('index', array(
            'dataProvider' => $dataProvider,
            'clientes' => $clientes,
            'total'=>$total,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Cliente('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Cliente']))
            $model->attributes = $_GET['Cliente'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Cliente the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Cliente::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Cliente $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'cliente-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionHistorico($id = 0){

        $historico = array();

        if(isset($_POST['historico'])){
            $id = $_POST['idCliente'];
            $param = $_POST['historico'];
            $data1 = $param['data1'];
            $data2 = $param['data2'];

            $historico = Venda::model()->getHistorico($id,$data1,$data2);
        }

        $this->render('historico',array(
            'model'=> $this->loadModel($id),
            'historico'=>$historico));
    }

    public function actionBuscarCliente(){

        $clientes = array();
        if(isset($_POST['cliente'])){
            $param = $_POST['cliente']['param'];

            $clientes = Cliente::model()->findCliente($param);
            $total = Cliente::model()->getTotal();

        }

        $this->render('index',array(
            'clientes' => $clientes,
            'total'=>$total,
        ));
    }

}
