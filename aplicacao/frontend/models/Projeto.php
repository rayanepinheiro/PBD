<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use app\models\ProjetoDetalhes;

/**
 * This is the model class for table "projeto".
 *
 * @property integer $id_projeto
 * @property integer $id_tipo_projeto
 * @property string $nome_projeto
 * @property string $descricao_projeto
 * @property string $palavras_chave
 * @property string $categoria
 * @property integer $id_usuario
 * @property integer $id_professor
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property User $idUsuario
 */
class Projeto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'projeto';
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
            [['nome_projeto', 'descricao_projeto', 'palavras_chave', 'categoria', 'id_usuario', 'id_professor'], 'required'],
            [['id_usuario'], 'integer'],
            [['nome_projeto', 'palavras_chave', 'categoria'], 'string', 'max' => 255],
            [['id_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_usuario' => 'id']],
            [['id_professor'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_professor' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_projeto' => 'ID do Projeto',
            'nome_projeto' => 'Nome do Projeto',
            'descricao_projeto' => 'Descrição do Projeto',
            'palavras_chave' => 'Palavras-Chave',
            'categoria' => 'Categoria',
            'id_usuario' => 'Usuário',
            'id_professor' => 'Professor Responsável',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUsuario()
    {
        return $this->hasOne(User::className(), ['id' => 'id_usuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProfessor()
    {
        return $this->hasOne(User::className(), ['id' => 'id_professor']);
    }

    /**
     * Retorna os projetos do usuário
     *
     * @param string $id_usuario id do usuário
     * @return static|null
     */
    public static function findProjetosUsuario($id_usuario)
    {
        return static::findAll([
            'id_usuario' => $id_usuario,
        ]);
    }

    /**
     * Retorna os projetos do associados ao professor
     *
     * @param string $id_professor id do professor
     * @return static|null
     */
    public static function findProjetosProfessor($id_professor)
    {
        return static::findAll([
            'id_professor' => $id_professor,
        ]);
    }

    /**
     * Cria os detalhes do projeto
     *
     * @param static|null
     * @return static|null
     */
    public function criadetalhes($codigo, $tipo)
    {
        if (!$this->validate()) {
            return null;
        }

        //Cria os dados do projeto.
        $atividades = Atividades::find()->where(['id_tipo_projeto' => $tipo])->all();

        foreach ($atividades as $value) {

            $projeto = new ProjetoDetalhes();

            $projeto->id_projeto = $codigo;
            $projeto->id_atividade = $value->id;
            $projeto->aprovado = 0;

            $projeto->save();
        }

        $projeto = ProjetoDetalhes::find()->where(['id_projeto' => $codigo])->orderBy('id_atividade')->one();
        $projeto->data_inicio_atividade = date('Y-m-d');
        $projeto->save();

        return $projeto;
    }

    public function getDetalhes($id_projeto){
        return ProjetoDetalhes::find()->where(['id_projeto' => $id_projeto])->orderBy('id_atividade')->all();
    }

    /**
     * Cria os dados de aprovação de etapa de projeto
     */
   public function aprovaProjeto($id_projeto, $id_atividade)
   {

      $projeto = ProjetoDetalhes::find()->where(['id_projeto' => $id_projeto,'id_atividade' => $id_atividade])->one();
      $projeto->data_fim_atividade = date('Y-m-d');
      $projeto->aprovado = 1;
      $projeto->save();

      return true;
   }
}
