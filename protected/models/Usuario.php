<?php

/**
 * This is the model class for table "usuario".
 *
 * The followings are the available columns in table 'usuario':
 * @property integer $idUsuario
 * @property string $nome
 * @property string $email
 * @property string $dataCadastro
 * @property integer $id_usuario
 * @property integer $isAdmin
 * @property integer $senha
 * @property integer $login
 * @property integer $telefone
 *
 * The followings are the available model relations:
 * @property Cliente[] $clientes
 * @property Fornecedor[] $fornecedors
 * @property Produto[] $produtos
 * @property Venda[] $vendas
 */
class Usuario extends CActiveRecord {

    var
        $confirmeSenha;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'usuario';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('nome, email,login, id_usuario', 'required'),
            array('id_usuario', 'numerical', 'integerOnly' => true),
            
            array('nome, email', 'length', 'max' => 100),
            array('dataCadastro', 'safe'),
            array('login','unique'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idUsuario, nome, email, dataCadastro, id_usuario', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'clientes' => array(self::HAS_MANY, 'Cliente', 'id_usuario'),
            'fornecedors' => array(self::HAS_MANY, 'Fornecedor', 'id_usuario'),
            'produtos' => array(self::HAS_MANY, 'Produto', 'id_usuario'),
            'vendas' => array(self::HAS_MANY, 'Venda', 'id_usuario'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idUsuario' => 'Id Usuario',
            'nome' => 'Nome',
            'email' => 'Email',
            'dataCadastro' => 'Data de Cadastro',
            'id_usuario' => 'Id Usuario',
            'isAdmin' => 'Administrador',
            'senha' => 'Senha',
            'confirmeSenha' => 'Confirme a senha',
            'login'=>'Login',
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('idUsuario', $this->idUsuario);
        $criteria->compare('nome', $this->nome, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('dataCadastro', $this->dataCadastro, true);
        $criteria->compare('id_usuario', $this->id_usuario);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Usuario the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getAllUsers(){
        $sql = "select * from usuario";

        $query = Yii::app()->db->createCommand($sql)->queryAll();

        return $query;
    }

    public function buscarUsuarios($param){
        $sql = "select * from usuario where nome like '%$param%' limit 0,10";
        $query = Yii::app()->db->createCommand($sql)->queryAll();

        return $query;
    }

}
