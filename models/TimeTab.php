<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "TimeTab".
 *
 * @property string $PerNo
 * @property string $CALCDATE
 * @property string $BEGINDATE
 * @property string $BEGINTIME
 * @property float $STATUS
 * @property string|null $DDESC
 * @property float|null $DURATION
 * @property string|null $ENDDATE
 * @property string|null $ENDTIME
 * @property float|null $EXTRAWORKSHEETCODE
 * @property float|null $MAMURIATSHEETCODE
 * @property float|null $MAMURIATTYPE
 * @property float|null $MORKHASISHEETCODE
 * @property float|null $MORKHASITYPE
 * @property float|null $PRESENCETYPE
 * @property float|null $SERVICELATESHEETCODE
 * @property float|null $SUSPENSIONSHEETCODE
 * @property float|null $WORKINGINTERVAL
 */
class TimeTab extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'TimeTab';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['PerNo', 'CALCDATE', 'BEGINDATE', 'BEGINTIME', 'STATUS'], 'required'],
            [['STATUS', 'DURATION', 'EXTRAWORKSHEETCODE', 'MAMURIATSHEETCODE', 'MAMURIATTYPE', 'MORKHASISHEETCODE', 'MORKHASITYPE', 'PRESENCETYPE', 'SERVICELATESHEETCODE', 'SUSPENSIONSHEETCODE', 'WORKINGINTERVAL'], 'number'],
            [['PerNo'], 'string', 'max' => 10],
            [['CALCDATE', 'BEGINDATE', 'BEGINTIME', 'ENDDATE', 'ENDTIME'], 'string', 'max' => 5],
            [['DDESC'], 'string', 'max' => 30],
            [['BEGINDATE', 'BEGINTIME', 'CALCDATE', 'PerNo', 'STATUS'], 'unique', 'targetAttribute' => ['BEGINDATE', 'BEGINTIME', 'CALCDATE', 'PerNo', 'STATUS']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'PerNo' => 'Per No',
            'CALCDATE' => 'Calcdate',
            'BEGINDATE' => 'Begindate',
            'BEGINTIME' => 'Begintime',
            'STATUS' => 'Status',
            'DDESC' => 'Ddesc',
            'DURATION' => 'Duration',
            'ENDDATE' => 'Enddate',
            'ENDTIME' => 'Endtime',
            'EXTRAWORKSHEETCODE' => 'Extraworksheetcode',
            'MAMURIATSHEETCODE' => 'Mamuriatsheetcode',
            'MAMURIATTYPE' => 'Mamuriattype',
            'MORKHASISHEETCODE' => 'Morkhasisheetcode',
            'MORKHASITYPE' => 'Morkhasitype',
            'PRESENCETYPE' => 'Presencetype',
            'SERVICELATESHEETCODE' => 'Servicelatesheetcode',
            'SUSPENSIONSHEETCODE' => 'Suspensionsheetcode',
            'WORKINGINTERVAL' => 'Workinginterval',
        ];
    }

    /**
     * {@inheritdoc}
     * @return TimeTabQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TimeTabQuery(get_called_class());
    }
}
