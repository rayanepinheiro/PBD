<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "log".
 *
 * @property int $id
 * @property string $user_id
 * @property int $tipo_log
 * @property string $descricao_evento
 * @property int $created_at
 */
class Log extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'log';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descricao_evento', 'created_at'], 'required'],
            [['tipo_log', 'created_at'], 'integer'],
            [['descricao_evento'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tipo_log' => 'Tipo Log',
            'descricao_evento' => 'Descricao Evento',
            'created_at' => 'Created At',
        ];
    }
}
