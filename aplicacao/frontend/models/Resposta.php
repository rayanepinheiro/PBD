<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "resposta".
 *
 * @property integer $id
 * @property integer $id_pergunta
 * @property integer $resposta
 *
 * @property Pergunta $idPergunta
 */
class Resposta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'resposta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pergunta', 'resposta'], 'integer'],
            [['resposta'], 'required'],
            [['id_pergunta'], 'exist', 'skipOnError' => true, 'targetClass' => Pergunta::className(), 'targetAttribute' => ['id_pergunta' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_pergunta' => 'Id Pergunta',
            'resposta' => 'Resposta',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPergunta()
    {
        return $this->hasOne(Pergunta::className(), ['id' => 'id_pergunta']);
    }
}
