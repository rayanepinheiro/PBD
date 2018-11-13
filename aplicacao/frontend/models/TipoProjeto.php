<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_projeto".
 *
 * @property integer $id
 * @property string $descricao_projeto
 *
 * @property Atividades[] $atividades
 * @property Praticas[] $praticas
 */
class TipoProjeto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_projeto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descricao_projeto'], 'required'],
            [['descricao_projeto'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descricao_projeto' => 'Descricao Projeto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAtividades()
    {
        return $this->hasMany(Atividades::className(), ['id_tipo_projeto' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPraticas()
    {
        return $this->hasMany(Praticas::className(), ['id_tipo_projeto' => 'id']);
    }
}
