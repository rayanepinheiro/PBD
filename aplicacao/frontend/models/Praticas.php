<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "praticas".
 *
 * @property integer $id
 * @property integer $id_atividade
 * @property string $descricao_pratica
 *
 * @property Atividades $idAtividade
 */
class Praticas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'praticas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_atividade', 'descricao_pratica'], 'required'],
            [['id_atividade'], 'integer'],
            [['descricao_pratica'], 'string', 'max' => 255],
            [['id_atividade'], 'exist', 'skipOnError' => true, 'targetClass' => Atividades::className(), 'targetAttribute' => ['id_atividade' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Código',
            'id_atividade' => 'Código da Atividade',
            'descricao_pratica' => 'Descrição',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAtividade()
    {
        return $this->hasOne(Atividades::className(), ['id' => 'id_atividade']);
    }
}
