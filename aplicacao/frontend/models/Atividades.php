<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "atividades".
 *
 * @property integer $id
 * @property integer $id_tipo_projeto
 * @property string $nome_titulo
 * @property string $informacoes_atividade
 * @property string $materiais_atividade
 * @property string $extensoes_permitidas
 *
 * @property TipoProjeto $idTipoProjeto
 * @property Praticas[] $praticas
 */
class Atividades extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'atividades';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tipo_projeto'], 'integer'],
            [['nome_titulo', 'informacoes_atividade', 'materiais_atividade', 'extensoes_permitidas'], 'required'],
            [['nome_titulo', 'extensoes_permitidas'], 'string', 'max' => 255],
            [['id_tipo_projeto'], 'exist', 'skipOnError' => true, 'targetClass' => TipoProjeto::className(), 'targetAttribute' => ['id_tipo_projeto' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Código',
            'id_tipo_projeto' => 'Tipo de Projeto',
            'nome_titulo' => 'Título da Atividade',
            'informacoes_atividade' => 'Informações',
            'materiais_atividade' => 'Materiais Necessários',
            'extensoes_permitidas' => 'Extensões Permitidas',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTipoProjeto()
    {
        return $this->hasOne(TipoProjeto::className(), ['id' => 'id_tipo_projeto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPraticas()
    {
        return $this->hasMany(Praticas::className(), ['id_atividade' => 'id']);
    }
	
	
}
