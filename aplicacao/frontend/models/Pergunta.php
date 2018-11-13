<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pergunta".
 *
 * @property integer $id
 * @property string $pergunta
 * @property integer $id_atividade
 *
 * @property Atividades $idAtividade
 */
class Pergunta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pergunta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pergunta', 'id_atividade'], 'required'],
            [['id_atividade'], 'integer'],
            [['pergunta'], 'string', 'max' => 255],
            [['id_atividade'], 'exist', 'skipOnError' => true, 'targetClass' => Atividades::className(), 'targetAttribute' => ['id_atividade' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pergunta' => 'Pergunta',
            'id_atividade' => 'Id Atividade',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAtividade()
    {
        return $this->hasOne(Atividades::className(), ['id' => 'id_atividade']);
    }

    /**
     * Retorna as perguntas associadas à atividade
     *
     * @param string $id_atividade da atividade
     * @return static|null
     */
    public static function findPerguntasAtividade($id_atividade)
    {
        return static::findAll([
            'id_atividade' => $id_atividade,
        ]);
    }
}
