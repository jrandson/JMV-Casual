<?php

/**
 * This is the model class for table "pagamento".
 *
 * The followings are the available columns in table 'pagamento':
 * @property integer $idPagamento
 * @property integer $id_venda
 * @property double $valor
 * @property string $data_pagamento
 *
 * The followings are the available model relations:
 * @property Venda $idVenda
 */
class Pagamento extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pagamento';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_venda', 'required'),
			array('id_venda', 'numerical', 'integerOnly'=>true),
			array('valor', 'numerical'),
			array('data_pagamento', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idPagamento, id_venda, valor, data_pagamento', 'safe', 'on'=>'search'),
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
			'idVenda' => array(self::BELONGS_TO, 'Venda', 'id_venda'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idPagamento' => 'Id Pagamento',
			'id_venda' => 'Id Venda',
			'valor' => 'Valor',
			'data_pagamento' => 'Data Pagamento',
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

		$criteria->compare('idPagamento',$this->idPagamento);
		$criteria->compare('id_venda',$this->id_venda);
		$criteria->compare('valor',$this->valor);
		$criteria->compare('data_pagamento',$this->data_pagamento,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pagamento the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getToalPagamentosDia(){
		$dataIni = date('Y-m-d 00:00:00');
		$datafim = date('Y-m-d 23:59:59');

		$sql = "select sum(valor) as total from pagamento p inner join venda v on v.idVenda = p.id_venda inner join
				conta c on c.id_venda = v.idVenda where p.data_pagamento between '$dataIni' and '$datafim'";
		$query = Yii::app()->db->createCommand($sql)->queryAll();

		return $query[0]['total'];
	}
}
