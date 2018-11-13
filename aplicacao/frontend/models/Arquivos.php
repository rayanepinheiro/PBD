<?php

namespace app\models;
use yii\web\UploadedFile;

use Yii;

/**
 * This is the model class for table "arquivos".
 *
 * @property integer $id
 * @property string $arquivo
 *
 */
class Arquivos extends \yii\db\ActiveRecord
{

    public $upload;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'arquivos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['arquivo'], 'required'],
            [['upload'], 'file', 'extensions' => 'docx, png, jpg'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
        ];
    }
}
