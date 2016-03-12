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
                'actions' => array(),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'searchByCod', 'productQuery', 'addItem', 'finalizaVenda', 'teste',
                    'addConta', 'getCliente','finalizarVendaAPrazo','index','view','finalizarVendaAPrazo','excluirItem','pagamento'),
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

        $model = $this->loadModel($id);
        $itens = $model->getItensVenda($id);

        $data = array(
            'model' => $model,
            'itensVenda'=>$itens,
        );

        $this->render('view',$data);
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

    public function actionSearchByCod() {

        $codProduto = $_POST['itemVenda']['codProduto'];

        //$produto = Produto::model()->findByPk(1);
        $produto = Produto::model()->find('codigo = :cod',array(':cod'=>$codProduto));

        $result = array(
            'descricao' => $produto->descricao,
            'preco' => $produto->precoVenda,
            'idProduto'=>$produto->idProduto,
            'codigo'=>$produto->codigo,
            'estoque'=>$produto->estoque,
        );

        $result = json_encode($result);

        echo $result;
    }

    public function actionProductQuery() {

        $produto = new Produto();
        if (isset($_POST['queryParam'])) {
            $param = trim($_POST['queryParam']);

            if ($param == "") {
                return;
            }

            $query = Produto::model()->getProduto($param);

            if (empty($query))
                echo "Nada encontrado";
            else {
                $result = "";
                foreach ($query as $row) {
                    $result .= "<h4>Descrição: $row->descricao </h4> <h5>Cod: $row->codigo </h5>Estoque: $row->estoque <br/>
                    -------------------------------------------------------------------</br>";
                }
                echo $result;
            }
        }
    }

    public function actionAddItem() {

        $this->viewData($_POST['itemVenda']);
        $item = $_POST['itemVenda'];
        $produto = Produto::model()->findByPk($item['idProduto']);

        if($item['quantidade'] > $produto->estoque){

            $this->setFlashMessage("notice","Quantidade em estoque insuficiente. Quantidade disponível: $produto->estoque");
            $this->redirect(array('index'));
        }

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

    public function actionExcluirItem($idProduto){

        $venda = Yii::app()->session['venda'];
        $itens = $venda['itensVenda'];
        $novosItens = array();
        foreach($itens as $item){
            if($item['idProduto'] != $idProduto){
                $novosItens[] = $item;
            }
        }

        $venda['itensVenda'] = $novosItens;
        Yii::app()->session['venda'] = $venda;

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

            $transaction = Yii::app()->db->beginTransaction();

            $idVenda = $this->registrarVenda($dataVenda['itensVenda']);

            if ($idVenda) {
                $transaction->commit();
                unset(Yii::app()->session['venda']);
                $this->setFlashMessage("success","Venda registrada com sucesso");
                $this->redirect(array('index'));
            } else {
                $transaction->rollback();
                $this->redirect(array('venda/index'));
            }
        }
    }

    private function registrarVenda($dataVenda) {

        try {

            $model = new Venda();

            $model->id_usuario = Yii::app()->user->id;

            if(!$model->save()){
                throw new Exception("Erro ao registrar esta venda");                
            }
            
            foreach ($dataVenda as $itemVenda) {                 
                 $this->registraItemVenda($itemVenda, $model->idVenda);
            }

            return $model->idVenda;

        } catch (Exception $e) {
            $msg = $e->getMessage();
            return 0;
        }
    }

    private function registraItemVenda($itemData, $idVenda) {
        
        $itemVenda = new ItemVenda();

        $itemVenda->id_venda = $idVenda;
        $itemVenda->id_produto = $itemData['idProduto'];
        $itemVenda->quantidade = $itemData['quantidade'];
        $itemVenda->preco = $itemData['preco'];

        $itemVenda->save();

        $this->atualizaEstoque($itemData['idProduto'],$itemData['quantidade']);
    }

    private function atualizaEstoque($idProduto, $quantidade) {

        $produto = Produto::model()->findByPk($idProduto);
        $produto->estoque -= $quantidade;
        if($produto->estoque < 0){
            $produto->estoque  = 0;
        }
        $produto->save();
    }

    private function registrarPagamento($idVenda, $valor) {

        $model = new Pagamento();
        $model->id_venda = $idVenda;
        $model->valor = $valor;

        $model->save();
    }

    public function actionFinalizarVendaAPrazo(){

        try{

            //$this->viewData($_POST);
            // $this->viewData(Yii::app()->session['venda']);

            $transaction = Venda::model()->dbConnection->beginTransaction();

            if(isset(Yii::app()->session['venda'])){
                $itensVenda = Yii::app()->session['venda']['itensVenda'];
            }
            else{
                throw new Exception("Não há nenhum item de venda para ser registrado");
            }

            $idVenda = $this->registrarVenda($itensVenda);

            if(!$idVenda){
                throw new Exception("Não foi possível registrar esta venda");
            }

            if(isset($_POST['cliente']['idCliente'])){
                $idCliente = $_POST['cliente']['idCliente'];

            }
            elseif(isset($_POST['cliente'])){
                $cliente = $_POST['cliente'];
                $modelCliente =  $this->cadastraCliente($cliente);
                $idCliente = $modelCliente->idCliente;
            }
            else{
                throw new Exception("Nehum cliente foi enviado para cadastro.");
            }


            $this->cadastraConta($idCliente,$idVenda);

            if(isset($_POST['venda']['pagamento'])){
                $valor = $_POST['venda']['pagamento'];
                $this->registraPagamento($valor,$idVenda);
            }

            $transaction->commit();
            unset(Yii::app()->session['venda']);
            $this->setFlashMessage('success', "Venda registrada com sucesso");

        }
        catch(Exception $e){
            $this->setFlashMessage('error', $e->getMessage());
            $transaction->rollback();
        }

        $this->redirect(array('index'));
    }

    private function cadastraCliente($cliente){

        $modelCliente = new Cliente();

        $modelCliente->nome = $cliente['nome'];
        $modelCliente->telefone = $cliente['telefone'];
        $modelCliente->endereco = $cliente['endereco'];

        if(!$modelCliente->save()){
            throw new Exception("Não foi possível cadastrar novo cliente");
        }

        return $modelCliente;
    }

    private function cadastraConta($idCliente,$idVenda){
        $modelConta = new Conta();

        $modelConta->id_cliente = $idCliente;
        $modelConta->id_venda = $idVenda;

        if(!$modelConta->save()){
            throw new Exception("Não foi possível criar uma nova conta");
        }

        return $modelConta;
    }

    private function registraPagamento($valorPagamento,$idVenda){

        $modelPagamento = new Pagamento();
        $modelPagamento->id_venda = $idVenda;
        $modelPagamento->valor = $valorPagamento;

        if(!$modelPagamento->save()){
            throw new Exception("Não foi possível registrar o pagamento desta venda");
        }

        return $modelPagamento;
    }

    public function actionTeste() {
       unset(Yii::app()->session['venda']);
    }

    public function actionAddConta() {

        try{

            $dataVenda = (isset(Yii::app()->session['venda'])) ? Yii::app()->session['venda'] : array();

            if (isset($_POST['conta'])){

                $conta = $_POST['conta'];

                $idVenda = $this->registrarVenda($dataVenda['itensVenda']);

                if ($idVenda) {
                    $this->criarConta($idVenda,$conta['idCliente'],$conta['pagamento']);

                    $this->setFlashMessage("success","Conta registrada com sucesso");
                }
            }

        }
        catch(Exception $e){
            $this->setFlashMessage("notice",$e->getMessage());
        }
        
        $data = array(

            'venda' => $dataVenda,
            'dataVenda'=>$dataVenda,
        );

        $this->render('addConta', $data);
    }

    private function criarConta($idVenda,$idCliente,$pagamento = 0) {

        $conta = new Conta();
        $conta->id_cliente = $idCliente;
        $conta->id_venda = $idVenda;

        $conta->save();

        if ($pagamento > 0) {
            $this->registrarPagamento($idVenda, $pagamento);
        }


    }

    public function actionPagamento(){
        if(isset($_POST['pagamento'])){
            $valor = $_POST['pagamento']['valor'];
            $idVenda  = $_POST['pagamento']['idVenda'];
            $idCliente = $_POST['pagamento']['idCliente'];

            $this->registraPagamento($valor,$idVenda);
        }

        $this->redirect(array('cliente/view','id'=>$idCliente));
    }

    public function actionGetCliente() {

        $telefone = $_POST['telefone'];

        $venda = Yii::app()->session['venda'];

        $cliente = Cliente::model()->buscaCliente($telefone);
        if($cliente == null){
            $debitos = array();
        }
        else{
            $debitos = $cliente->getDebitos();
        }


        $this->renderPartial('pagamento', array(
            'cliente' => $cliente,
            'debitos'=>$debitos,
            'venda'=>$venda,
            )
        );
    }
  

}
