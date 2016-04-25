<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "gradations".
 *
 * @property integer $id
 * @property string $text_info
 */
class Gradations extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gradations';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'text_info'], 'required'],
            [['id'], 'integer'],
            [['text_info'], 'string'],
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
