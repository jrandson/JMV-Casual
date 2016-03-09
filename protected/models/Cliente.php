<?php

/**
 * This is the model class for table "cliente".
 *
 * The followings are the available columns in table 'cliente':
 * @property integer $idCliente
 * @property string $nome
 * @property string $endereco
 * @property string $rg
 * @property string $cpf
 * @property string $data_cadastro
 * @property integer $id_usuario
 * @property integer $telefone
 *
 * The followings are the available model relations:
 * @property Usuario $idUsuario
 * @property Conta[] $contas
 */
class Cliente extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cliente';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_usuario', 'numerical', 'integerOnly'=>true),
			array('nome, endereco', 'length', 'max'=>100),
			array('rg, cpf', 'length', 'max'=>45),
			array('data_cadastro', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idCliente, nome, endereco, rg, cpf, data_cadastro, id_usuario', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'idUsuario' => array(self::BELONGS_TO, 'Usuario', 'id_usuario'),
			'contas' => array(self::HAS_MANY, 'Conta', 'id_cliente'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idCliente' => 'Id Cliente',
			'nome' => 'Nome',
			'endereco' => 'Endreço',
			'rg' => 'RG',
			'cpf' => 'CPF',
			'data_cadastro' => 'Data Cadastro',
			'id_usuario' => 'Id Usuario',
                        'telefone' => 'Telefone',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idCliente',$this->idCliente);
		$criteria->compare('nome',$this->nome,true);
		$criteria->compare('endereco',$this->endereco,true);
		$criteria->compare('rg',$this->rg,true);
		$criteria->compare('cpf',$this->cpf,true);
		$criteria->compare('data_cadastro',$this->data_cadastro,true);
		$criteria->compare('id_usuario',$this->id_usuario);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Cliente the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
	public function buscaCliente($telefone){

		$model = $this->find('telefone = :telefone',array(':telefone'=>$telefone));

		return $model;
	}

	private function getQuery($sql){
		$query = Yii::app()->db->createCommand($sql)->queryAll();

		return $query;
	}

	public function getDebitos($idCliente = 0){
		if($idCliente == 0)
			$idCliente = $this->idCliente;

		if($idCliente == null){
			return array();
		}

		$sql = "select v.* from venda v
				inner join conta co on co.id_Venda = v.idVenda
				inner join cliente c on co.id_cliente = c.idCliente
				where c.idCliente = $idCliente and co.quitada = 0";

		$queryVendas = $this->getQuery($sql);

		$debitos = array();
		foreach($queryVendas as $row){
			$venda = $row;

			$sql = "select iv.*, p.descricao,p.codigo from item_venda iv
				inner join produto p on iv.id_produto = p.idProduto
				inner join venda v on iv.id_venda = v.idVenda
				where v.idVenda = ".$row['idVenda'];

			$query = $this->getQuery($sql);

			$venda['itensVenda'] = $query;

			$totalVenda = $this->getTotalVenda($query);
			$totalPago = $this->getTotalPago(($row['idVenda']));

			if($totalVenda > $totalPago){
				$venda['totalVenda'] = $this->getTotalVenda($query);
				$venda['totalPago'] = $this->getTotalPago(($row['idVenda']));

				$debitos[] = $venda;
			}


		}

		return $debitos;

	}

	private function getTotalVenda($itensVenda){
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

		$query = $this->getQuery($sql);

		$total = 0;
		foreach($query as $row){
			$total += $row['valor'];
		}

		return $total;
	}
}
