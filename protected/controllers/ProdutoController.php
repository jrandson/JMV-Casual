<?php

class ProdutoController extends Controller {

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
                'actions' => array('create', 'update'),
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
        $categoria = $model->getCategoria($id);

        $this->render('view', array(
            'model' => $model,
            'categoria'=>$categoria,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {

        try{

            $model = new Produto;

            // Uncomment the following line if AJAX validation is needed
            // $this->performAjaxValidation($model);

            if (isset($_POST['Produto'])) {
                $model->attributes = $_POST['Produto'];
                $model->codigo = $_POST['Produto']['codigo'];

                if($model->verifyCode($_POST['Produto']['codigo'])){
                    throw new Exception("Este código já está cadastrado");
                }

                $model->id_categoria = $_POST['Produto']['id_categoria'];
                $model->id_usuario = Yii::app()->user->id;


                if ($model->save())
                    $this->redirect(array('view', 'id' => $model->idProduto));

            }

        }
        catch(Exception $e){
            $this->setFlashMessage("error",$e->getMessage());
        }
        
        $categorias = Categoria::model()->findAll();
        
        $this->render('create', array(
            'model' => $model,
            'categorias'=>$categorias,
        ));
    }

    /**
     * Updates a particular model.
     * If updateupdate is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Produto'])) {
            $model->attributes = $_POST['Produto'];
            $model->codigo = $_POST['Produto']['codigo'];

            if($model->verifyCode($_POST['Produto']['codigo'])){
                throw new Exception("Este código já está cadastrado");
            }

            $model->id_categoria = $_POST['Produto']['id_categoria'];
                        
                    
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->idProduto));
        }
        
        $categorias = Categoria::model()->findAll();
        $this->render('update', array(
            'categorias'=>$categorias,
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

        $model = new Produto();

        if(isset($_POST['busca'])){
            $param = $_POST['busca'];
            $produtos = $model->buscarProdutos($param);
            $categoriaBuscada = Categoria::model()->findByPk($param['idCategoria']);
        }
        else{
            $produtos = $model->getAll();
        }

        $categorias = Categoria::model()->getAll();

        $data = array(
            'produtos'=>$produtos,
            'categoriaBuscada'=>$categoriaBuscada->descricao,
            'categorias'=>$categorias,
        );

        $this->render('index',$data);

    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Produto('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Produto']))
            $model->attributes = $_GET['Produto'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Produto the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Produto::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Produto $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'produto-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
