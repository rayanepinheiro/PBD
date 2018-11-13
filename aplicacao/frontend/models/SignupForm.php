<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;
use app\models\Cursos;
use yiibr\brvalidator\CpfValidator;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $data_nascimento;
    public $sexo;
    public $nome;
    public $cpf;
    public $repeat_password;
    public $id_curso;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required', 'message' => 'Usuário não pode ficar em branco.'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Este e-mail já está associado a um usuário.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['username', 'email', 'message' => 'Este e-mail é inválido.'],
            ['username', 'validarSufixoEmail'],

            ['password', 'required', 'message' => 'A senha não pode ficar em branco.'],
            ['password', 'string', 'min' => 6, 'message' => 'Senha muito curta.'],
            ['password', 'compare', 'compareAttribute' => 'repeat_password', 'message' => 'As senhas não combinam.'],

            ['sexo', 'required', 'message' => 'Escolha um sexo.'],
            ['data_nascimento', 'required', 'message' => 'Preencha uma data de nascimento.'],
            ['nome', 'required', 'message' => 'O nome não pode ser em branco.'],
            ['cpf', 'required', 'message' => 'Preencha com um CPF válido.'],
            ['cpf', 'string', 'min' => 11, 'max' => 14],
            ['cpf', CpfValidator::className(), 'message' => 'CPF inválido'],

            ['repeat_password', 'required', 'message' => 'Repita a senha.'],
            ['repeat_password', 'string', 'min' => 6, 'message' => 'Senha muito curta.'],

            ['id_curso', 'required', 'message' => 'Escolha um curso.'],
            ['id_curso', 'exist', 'targetAttribute' => 'id', 'targetClass' => Cursos::className()],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->username;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->sexo = $this->sexo;
        $user->data_nascimento = $this->data_nascimento;
        $user->nome = $this->nome;
        $user->cpf = $this->cpf;
        $user->id_curso = $this->id_curso;
        
        return $user->save() ? $user : null;
    }

    /**
    * @inheritdoc
    */
    public function attributeLabels()
    {
        return [
            'username' => 'E-mail iComp',
            'nome' => 'Nome Completo',
            'cpf' => 'CPF',
            'password' => 'Senha',
            'repeat_password' => 'Repetir Senha',
            'data_nascimento' => 'Data de Nascimento',
            'curso' => 'Curso',
        ];
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
}
