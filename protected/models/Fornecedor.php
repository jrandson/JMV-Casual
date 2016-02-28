<?php

/**
 * This is the model class for table "fornecedor".
 *
 * The followings are the available columns in table 'fornecedor':
 * @property integer $idFornecedor
 * @property string $razao
 * @property string $responsavel
 * @property string $telefone
 * @property string $email
 * @property string $endereco
 * @property string $data_cadastro
 * @property integer $id_usuario
 * @property integer $observacao
 *
 * The followings are the available model relations:
 * @property Usuario $idUsuario
 */
class Fornecedor extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'fornecedor';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_usuario', 'numerical', 'integerOnly' => true),
			array('razao, responsavel, endereco', 'length', 'max' => 100),
			array('telefone, email', 'length', 'max' => 45),
			array('data_cadastro', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idFornecedor, razao, responsavel, telefone, email, endereco, data_cadastro, id_usuario', 'safe', 'on' => 'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idFornecedor' => 'Id Fornecedor',
			'razao' => 'Razao',
			'responsavel' => 'Responsavel',
			'telefone' => 'Telefone',
			'email' => 'Email',
			'endereco' => 'Endereco',
			'data_cadastro' => 'Data Cadastro',
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

		$criteria = new CDbCriteria;

		$criteria->compare('idFornecedor', $this->idFornecedor);
		$criteria->compare('razao', $this->razao, true);
		$criteria->compare('responsavel', $this->responsavel, true);
		$criteria->compare('telefone', $this->telefone, true);
		$criteria->compare('email', $this->email, true);
		$criteria->compare('endereco', $this->endereco, true);
		$criteria->compare('data_cadastro', $this->data_cadastro, true);
		$criteria->compare('id_usuario', $this->id_usuario);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Fornecedor the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

	public function getAllForncedores()
	{
		$sql = "select * from fornecedor  order by data_cadastro desc limit 0,20";
		$query = Yii::app()->db->createCommand($sql)->queryAll();

		return $query;
	}

	public function buscarFornecedor($param)
	{
		$sql = "select * from fornecedor where razao like '%$param%' limit 0,20";
		$query = Yii::app()->db->createCommand($sql)->queryAll();

		return $query;

	}
}
