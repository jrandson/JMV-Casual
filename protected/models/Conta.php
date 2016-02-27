<?php

/**
 * This is the model class for table "conta".
 *
 * The followings are the available columns in table 'conta':
 * @property integer $idConta
 * @property integer $id_venda
 * @property integer $id_cliente


 *
 * The followings are the available model relations:
 * @property Cliente $idCliente
 * @property Venda $idVenda
 */
class Conta extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'conta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_venda, id_cliente', 'required'),
			array('id_venda, id_cliente, quitada', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idConta, id_venda, id_cliente, id_cliente, quitada', 'safe', 'on'=>'search'),
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
			'idCliente' => array(self::BELONGS_TO, 'Cliente', 'id_cliente'),
			'idVenda' => array(self::BELONGS_TO, 'Venda', 'id_venda'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idConta' => 'Id Conta',
			'id_venda' => 'Id Venda',
			'id_cliente' => 'Id Cliente',

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

		$criteria->compare('idConta',$this->idConta);
		$criteria->compare('id_venda',$this->id_venda);
		$criteria->compare('id_cliente',$this->id_cliente);
		$criteria->compare('quitada',$this->quitada);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Conta the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
