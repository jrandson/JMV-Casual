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
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'venda';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
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

	/**
	 * @return array relational rules.
	 */
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

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idVenda' => 'Id Venda',
			'id_usuario' => 'Id Usuario',
			'dataVenda' => 'Data Venda',
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

		$criteria->compare('idVenda',$this->idVenda);
		$criteria->compare('id_usuario',$this->id_usuario);
		$criteria->compare('dataVenda',$this->dataVenda,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Venda the static model class
	 */
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
}
