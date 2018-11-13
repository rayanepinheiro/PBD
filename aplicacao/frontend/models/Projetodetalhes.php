<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "projetodetalhes".
 *
 * @property integer $id
 * @property integer $id_projeto
 * @property integer $id_atividade
 * @property string $data_inicio_atividade
 * @property string $data_fim_atividade
 * @property integer $aprovado
 * @property integer $id_arquivo_final
 * @property Arquivos $idArquivoFinal
 * @property Atividades $idAtividade
 * @property Projeto $idProjeto
 */
class Projetodetalhes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'projetodetalhes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_projeto', 'id_atividade', 'aprovado'], 'required'],
            [['id_projeto', 'id_atividade', 'aprovado', 'id_arquivo_final'], 'integer'],
            [['data_inicio_atividade', 'data_fim_atividade'], 'safe'],
            [['id_arquivo_final'], 'exist', 'skipOnError' => true, 'targetClass' => Arquivos::className(), 'targetAttribute' => ['id_arquivo_final' => 'id']],
            [['id_atividade'], 'exist', 'skipOnError' => true, 'targetClass' => Atividades::className(), 'targetAttribute' => ['id_atividade' => 'id']],
            [['id_projeto'], 'exist', 'skipOnError' => true, 'targetClass' => Projeto::className(), 'targetAttribute' => ['id_projeto' => 'id_projeto']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Código',
            'id_projeto' => 'Código do Projeto',
            'id_atividade' => 'Código da Atividade',
            'data_inicio_atividade' => 'Data de Início da Atividade',
            'data_fim_atividade' => 'Data de Finalização da Atividade',
            'aprovado' => 'Aprovado?',
            'id_arquivo_final' => 'Código do Arquivo Final',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdArquivoFinal()
    {
        return $this->hasOne(Arquivos::className(), ['id' => 'id_arquivo_final']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAtividade()
    {
        return $this->hasOne(Atividades::className(), ['id' => 'id_atividade']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProjeto()
    {
        return $this->hasOne(Projeto::className(), ['id_projeto' => 'id_projeto']);
    }

    /**
     * @inheritdoc
     */
    public function beforeSave($insert){
        if (parent::beforeSave($insert)) {

            $myDateTime = \DateTime::createFromFormat('d/m/Y', $this->data_inicio_atividade);

            if (!$myDateTime == 0){
                $this->data_inicio_atividade = $myDateTime->format('Y-m-d');
            }

            $myDateTime = \DateTime::createFromFormat('d/m/Y', $this->data_fim_atividade);

            if (!$myDateTime == 0){
                $this->data_fim_atividade = $myDateTime->format('Y-m-d');
            }

            return true;
        } else {
            return false;
        }
    }

    public function afterFind(){

        $myDateTime = \DateTime::createFromFormat('Y-m-d', $this->data_inicio_atividade);

        if (!$myDateTime == 0){
            $this->data_inicio_atividade = $myDateTime->format('d/m/Y');
        }

        $myDateTime = \DateTime::createFromFormat('Y-m-d', $this->data_fim_atividade);

        if (!$myDateTime == 0){
            $this->data_fim_atividade = $myDateTime->format('d/m/Y');
        }

        return TRUE;
    }
}
