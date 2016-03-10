<?php

/**
 * This is the model class for table "venda".
 *
 * The followings are the available columns in table 'venda':
 * @property integer $idVenda
 * @property integer $id_usuario
 * @property string $dataVenda
 *
 * The followings are the available model relations:
 * @property Conta[] $contas
 * @property ItemVenda[] $itemVendas
 * @property Pagamento[] $pagamentos
 * @property Usuario $idUsuario
 */
class Venda extends CActiveRecord
{

	public function tableName(){
		return 'venda';
	}

	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_usuario', 'required'),
			array('id_usuario', 'numerical', 'integerOnly'=>true),
			array('dataVenda', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idVenda, id_usuario, dataVenda', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'contas' => array(self::HAS_MANY, 'Conta', 'id_venda'),
			'itemVendas' => array(self::HAS_MANY, 'ItemVenda', 'id_venda'),
			'pagamentos' => array(self::HAS_MANY, 'Pagamento', 'id_venda'),
			'idUsuario' => array(self::BELONGS_TO, 'Usuario', 'id_usuario'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'idVenda' => 'Id Venda',
			'id_usuario' => 'Id Usuario',
			'dataVenda' => 'Data Venda',
		);
	}

	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idVenda',$this->idVenda);
		$criteria->compare('id_usuario',$this->id_usuario);
		$criteria->compare('dataVenda',$this->dataVenda,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getItensVenda($idVenda){

		$sql = "Select p.descricao,p.precoVenda, iv.quantidade, (p.precoVenda * iv.quantidade) as subtotal
				from item_venda iv
				inner join produto p on iv.id_produto = p.idProduto
 				inner join venda v on iv.id_venda = v.idVenda
 				where id_venda = $idVenda";

		$query = Yii::app()->db->createCommand($sql)->queryAll();

		return $query;
	}

	public function getTotalVenda($itensVenda){
		$total = 0;
		foreach($itensVenda as $item){
			$total += $item['preco']*$item['quantidade'];
		}

		return $total;
	}

	public function getTotalPago($idVenda){

		$sql = "select p.valor from pagamento p
				inner join venda v on v.idVenda = p.id_venda
				inner join conta c on c.id_venda = v.idVenda
				where v.idVenda = $idVenda";

		$query = Yii::app()->db->createCommand($sql)->queryAll();

		$total = 0;
		foreach($query as $row){
			$total += $row['valor'];
		}

		return $total;
	}

	public function getHistorico($data1,$data2){

		$data1 = $this->formataData($data1);//'2016-01-01';// $param['data1'];
		$data2 = $this->formataData($data2);//$param['data2'];

		$sql = "select * from venda where dataVenda between '$data1' AND '$data2'";

		$query = Yii::app()->db->createCommand($sql)->queryAll();

		$historico = array();

		foreach($query as $row){
			$itensVenda = Venda::model()->getItensVenda($row['idVenda']);
			$venda = $row;
			$venda['itensVenda'] = $itensVenda;
			$venda['totalVenda'] = $this->getTotalVenda($itensVenda);
			$historico[] = $venda;
		}
	}

	private function formataData($input){
		$dataIn = explode('/',$input);
		$newDate = $dataIn[2].'-'.$dataIn[0].'-'.$dataIn[1];

		return $newDate;
	}

}
