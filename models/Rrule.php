<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rrule".
 *
 * @property string $PERNO
 * @property float $RULENO
 * @property string|null $BEGINDATE
 * @property string|null $ENDDATE
 * @property string|null $KARTNO
 * @property string|null $REGDATE
 * @property string|null $SECTION
 * @property float|null $WORKGROUP
 * @property string|null $KartNo2
 * @property string|null $isShiftKar
 * @property float|null $PatternCode
 */
class Rrule extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rrule';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db3');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['PERNO', 'RULENO'], 'required'],
            [['RULENO', 'WORKGROUP', 'PatternCode'], 'number'],
            [['PERNO', 'KARTNO', 'KartNo2'], 'string', 'max' => 10],
            [['BEGINDATE', 'ENDDATE', 'REGDATE'], 'string', 'max' => 5],
            [['SECTION'], 'string', 'max' => 30],
            [['isShiftKar'], 'string', 'max' => 1],
            [['PERNO', 'RULENO'], 'unique', 'targetAttribute' => ['PERNO', 'RULENO']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'PERNO' => 'Perno',
            'RULENO' => 'Ruleno',
            'BEGINDATE' => 'Begindate',
            'ENDDATE' => 'Enddate',
            'KARTNO' => 'Kartno',
            'REGDATE' => 'Regdate',
            'SECTION' => 'Section',
            'WORKGROUP' => 'Workgroup',
            'KartNo2' => 'Kart No2',
            'isShiftKar' => 'Is Shift Kar',
            'PatternCode' => 'Pattern Code',
        ];
    }

    /**
     * {@inheritdoc}
     * @return RruleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RruleQuery(get_called_class());
    }
}
