<?php

class VendaController extends Controller {

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
                'actions' => array('create', 'update', 'searchById', 'productQuery', 'addItem', 'finalizaVenda', 'teste',
                    'addConta', 'getCliente'),
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
        $venda = $this->loadModel($id);
        $this->viewData($venda);

        return;

        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    public function actionCreate() {
        $model = new Venda;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['Venda'])) {
            $model->attributes = $_POST['Venda'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->idVenda));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    public function actionUpdate($id) {
        $model = $this->loadModel($id);

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['Venda'])) {
            $model->attributes = $_POST['Venda'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->idVenda));
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

        if (!isset(Yii::app()->session['venda'])) {
            Yii::app()->session['venda'] = array(
                'itensVenda' => array(),
            );
        }

        //$dataProvider = new CActiveDataProvider('Venda');
        $this->render('index', array(
            'dataProvider' => array(), //$dataProvider,
        ));
    }

    public function actionAdmin() {
        $model = new Venda('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Venda']))
            $model->attributes = $_GET['Venda'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function loadModel($id) {
        $model = Venda::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'venda-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionSearchById() {

        $idProduto = $_POST['itemVenda']['idProduto'];

        $produto = Produto::model()->findByPk($idProduto);

        $result = array(
            'descricao' => $produto->descricao,
            'preco' => $produto->precoVenda,
        );

        $result = json_encode($result);
        echo $result;
    }

    public function actionProductQuery() {

        $produto = new Produto();
        if (isset($_POST['queryParam'])) {
            $param = trim($_POST['queryParam']);

            if ($param == "")
                return;

            $query = Produto::model()->findAllBySql("select * from produto where descricao like '%" . $param . "%' limit 0,5");

            if (empty($query))
                echo "";
            else {
                $result = "";
                foreach ($query as $row) {
                    $result .= "<h4>Descrição: $row->descricao </h34> <h5>Cod: $row->codigo </h5>Estoque: $row->estoque <br/>";
                }
                echo $result;
            }
        }
    }

    public function actionAddItem() {

        $item_valido = 1;
        foreach ($_POST['itemVenda'] as $item) {
            if ($item == NULL)
                $item_valido = 0;
        }
        if ($item_valido) {

            if (isset(Yii::app()->session['venda'])) {
                $venda = Yii::app()->session['venda'];
            } else {
                $venda = array();
            }

            if (isset($_POST['itemVenda'])) {
                $itemVenda = $_POST['itemVenda'];
                unset($_POST['itemVenda']);
                $venda['itensVenda'][] = $itemVenda;
                Yii::app()->session['venda'] = $venda;
            }
        }

        $this->redirect(array('venda/index'));
    }

    public function actionFinalizaVenda() {


        $dataPayment = $_POST['dataPayment'];

        /**
         * forma de pagamento:
         * 0-> a vista
         * 1-> adicionar à conta do cliente
         */
        if ($dataPayment['formaPagamento']) {

            $this->redirect(array('addConta'));
            
        } else {

            $dataVenda = (isset(Yii::app()->session['venda'])) ? Yii::app()->session['venda'] : array();

            $idVenda = $this->registrarVenda($dataVenda['itensVenda']);

            if ($idVenda) {
                $this->redirect(array('view', 'id' => $idVenda));
            } else {
                $this->redirect(array('venda/index'));
            }
        }
    }

    private function registrarVenda($dataVenda) {

        $model = new Venda();
        $transaction = $model->dbConnection->beginTransaction();
        try {

            $model->id_usuario = Yii::app()->user->id;
            if(!$model->save()){
                throw new Exception("Erro ao registrar esta venda");                
            }
            
            foreach ($dataVenda as $itemVenda) {                 
                 $this->registraItemVenda($itemVenda, $model->idVenda);
            }
            
            $transaction->commit();

            unset(Yii::app()->session['venda']);

            return $model->idVenda;
            
        } catch (Exception $e) {
            $transaction->rollback();
            return 0;
        }
    }

    private function registraItemVenda($itemData, $idVenda) {
        
        $itemVenda = new ItemVenda();

        $itemVenda->id_venda = $idVenda;
        $itemVenda->id_produto = $itemData['idProduto'];
        $itemVenda->quantidade = $itemData['quantidade'];

        $itemVenda->save();

        $this->atualizaEstoque($itemData['idProduto'],$itemData['quantidade']);
    }

    private function atualizaEstoque($idProduto, $quantidade) {
        
        echo $idProduto;
        $produto = Produto::model()->findByPk($idProduto);
        $produto->estoque -= $quantidade;
        $produto->save();
    }

    private function registrarPagamento($idVenda, $valor) {

        $model = new Pagamento();
        $model->id_venda = $idVenda;
        $model->valor = $valor;

        $model->save();
    }

    public function actionTeste() {
        unset(Yii::app()->session['venda']);
        $this->viewData(Yii::app()->session['venda']);
    }

    public function actionAddConta() {
        
        if (isset($_POST['conta'])) {
            
            $conta = $_POST['conta'];
            $this->viewData($conta);            
            $dataVenda = (isset(Yii::app()->session['venda'])) ? Yii::app()->session['venda'] : array();
            $this->viewData(Yii::app()->session['venda']);  
            return;
            $idVenda = $this->registrarVenda($dataVenda['itensVenda']);
            
            if ($idVenda) {
                $this->criarConta($idVenda,$conta['idCliente'],$conta['pagamento']);
            }
        } 
        
        $data = array(
            'venda' => array(),//Yii::app()->session['venda'],
        );

        $this->render('addConta', $data);
    }

    private function criarConta($idVenda,$idCliente,$pagamento = 0) {
        
        $conta = new Conta();
        $conta->id_cliente = $idCliente;
        $conta->id_venda = $idVenda;

        $conta->save();

        if ($$pagamento != 0) {
            $this->registrarPagamento($idVenda, $valor);
        }
    }

    public function actionGetCliente() {

        $telefone = $_POST['telefone'];

        $cliente = Cliente::model()->buscaCliente($telefone);

        
        $debitos = $cliente->getDebitos();
        $this->render('addConta', array(
            'cliente' => $cliente,
            'debitos'=>$debitos));
    }
  

}
