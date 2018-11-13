<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yiibr\brvalidator\CpfValidator;
use app\models\Cursos;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $nome
 * @property string $cpf
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $data_nascimento
 * @property string $sexo
 * @property integer $aluno
 * @property integer $professor
 * @property integer $administrador
 * @property integer $id_curso
 */
class User extends \yii\db\ActiveRecord
{
    public $senha;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'nome', 'cpf', 'data_nascimento', 'sexo'], 'required', 'message' => 'Campo Obrigatório'],
            [['status', 'created_at', 'updated_at', 'aluno', 'professor', 'administrador'], 'integer'],
            [['data_nascimento'], 'safe'],
            [['username', 'nome', 'email'], 'string', 'max' => 255],
            [['cpf'], 'string', 'min' => 11, 'max' => 14, 'message' => 'CPF incompleto.'],
            [['sexo'], 'string', 'max' => 1],
            [['username'], 'unique', 'message' => 'Este usuário já está cadastrado no sistema.'],
            [['email'], 'unique'],
            ['username', 'email', 'message' => 'Email inválido.'],

            ['senha', 'required', 'on' => 'create', 'message' => 'Senha não pode ser em branco.'],
            ['cpf', CpfValidator::className(), 'message' => 'CPF inválido'],
            ['username', 'validarSufixoEmail'],
            ['id_curso', 'required', 'message' => 'Escolha um curso.'],
            ['id_curso', 'exist', 'targetAttribute' => 'id', 'targetClass' => Cursos::className()],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Login/E-mail',
            'nome' => 'Nome Completo',
            'cpf' => 'CPF',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'data_nascimento' => 'Data de Nascimento',
            'sexo' => 'Sexo',
            'aluno' => 'Aluno',
            'professor' => 'Professor',
            'administrador' => 'Administrador',
            'id_curso' => 'Curso',
            'senha' => 'Senha',
        ];
    }

    /**
     * @inheritdoc
     */
    public function beforeSave($insert){
        if (parent::beforeSave($insert)) {

            $this->generateAuthKey();
            $this->email = $this->username;
            $this->status = 10;

            if (!empty(trim($this->senha))){
                $this->setPassword($this->senha);
            }

            $myDateTime = \DateTime::createFromFormat('d/m/Y', $this->data_nascimento);
            $this->data_nascimento = $myDateTime->format('Y-m-d');

            return true;
        } else {
            return false;
        }
    }

    public function afterFind(){

        $myDateTime = \DateTime::createFromFormat('Y-m-d', $this->data_nascimento);
        $this->data_nascimento = $myDateTime->format('d/m/Y');

        return TRUE;
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Valida o sufixo do e-mail 
     * Este metódo valida o sufixo do e-mail.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validarSufixoEmail($attribute, $params)
    {
        $usuario = explode('@', $this->username);

        if (is_array($usuario)){
            $sufixo = $usuario[1];
        }else{
            $sufixo = $usuario;
        }

        if ($sufixo != 'icomp.ufam.edu.br') {
            $this->addError($attribute, 'O e-mail deve ser do iComp.');
        }
    }

    public static function findUsuario($id)
    {
        return static::findOne(['id' => $id]);
    }

    public static function findProfessores()
    {
        return static::findAll(['professor' => 1]);
    }
}
