<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cursos".
 *
 * @property integer $id
 * @property string $nome_curso
 * @property string $sigla_curso
 *
 * @property User[] $users
 */
class Cursos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cursos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome_curso', 'sigla_curso'], 'required', 'message' => 'Campo obrigatório.'],
            [['nome_curso'], 'string', 'max' => 255],
            [['sigla_curso'], 'string', 'max' => 2],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Código',
            'nome_curso' => 'Nome do Curso',
            'sigla_curso' => 'Sigla do Curso',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['id_curso' => 'id']);
    }
}
