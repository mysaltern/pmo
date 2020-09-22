<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "section".
 *
 * @property string $CODE
 * @property string|null $NAME
 * @property string|null $HAZCODE
 */
class Section extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'section';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db4');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['CODE'], 'required'],
            [['CODE'], 'string', 'max' => 30],
            [['NAME'], 'string', 'max' => 50],
            [['HAZCODE'], 'string', 'max' => 8],
            [['CODE'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'CODE' => 'Code',
            'NAME' => 'Name',
            'HAZCODE' => 'Hazcode',
        ];
    }

    /**
     * {@inheritdoc}
     * @return SectionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SectionQuery(get_called_class());
    }
}
