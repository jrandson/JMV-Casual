<?php

/**
 * This is the model class for table "produto".
 *
 * The followings are the available columns in table 'produto':
 * @property integer $idProduto
 * @property string $codigo
 * @property string $produto
 * @property string $descricao
 * @property double $precoVenda
 * @property double $precoCompra
 * @property integer $estoque
 * @property string $localizacao
 * @property integer $id_usuario
 * @property Categoria $id_categoria
 * 
 *
 * The followings are the available model relations:
 * @property ItemVenda[] $itemVendas
 * @property Usuario $idUsuario
 * @property Categoria $idCategoria
 */
class Produto extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'produto';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('produto', 'required'),
			array('estoque, id_usuario', 'numerical', 'integerOnly'=>true),
			array('precoVenda, precoCompra', 'numerical'),
			array('descricao, localizacao', 'length', 'max'=>300),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idProduto, descricao, precoVenda, precoCompra, estoque, localizacao, id_usuario', 'safe', 'on'=>'search'),
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
			'itemVendas' => array(self::HAS_MANY, 'ItemVenda', 'id_produto'),
			'idUsuario' => array(self::BELONGS_TO, 'Usuario', 'id_usuario'),
                        'idUsuario' => array(self::BELONGS_TO, 'Categoria', 'id_categoria'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idProduto' => 'Id Produto',
			'descricao' => 'Descricao',
			'precoVenda' => 'Preco Venda',
			'precoCompra' => 'Preco Compra',
			'estoque' => 'Estoque',
			'localizacao' => 'Localizacao',
			'id_usuario' => 'Id Usuario',
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

		$criteria->compare('idProduto',$this->idProduto);
		$criteria->compare('descricao',$this->descricao,true);
		$criteria->compare('precoVenda',$this->precoVenda);
		$criteria->compare('precoCompra',$this->precoCompra);
		$criteria->compare('estoque',$this->estoque);
		$criteria->compare('localizacao',$this->localizacao,true);
		$criteria->compare('id_usuario',$this->id_usuario);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Produto the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getAll(){

		$query = $this->findAll('',array());
		return $query;
	}
}
