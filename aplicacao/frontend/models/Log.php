<?php

namespace app\models;

use Yii;
// use app\models\Log;

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
            'tipo_log' => 'Tipo do Log',
            'descricao_evento' => 'Descrição do Log',
            'created_at' => 'Data de criação',
        ];
    }

    public function registraLog($tipo_log, $descricao_evento)
    {
       // $log = new Log();

       $log->tipo_log = $tipo_log;
       $log->descricao_evento = $descricao_evento;
       $log->created_at = date('d-m-Y');
       $log->save();

       return true;
    }
}
