<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "IOInfo".
 *
 * @property string $PERNO
 * @property string $BEGINDATE
 * @property string $BEGINTIME
 * @property string|null $ENDDATE
 * @property string|null $ENDTIME
 * @property string|null $BBEGINTIME
 * @property string|null $BENDDATE
 * @property string|null $BENDTIME
 * @property string|null $BEGINCLOCK
 * @property string|null $ENDCLOCK
 * @property float|null $DURATION
 * @property float|null $BeginComCode
 * @property float|null $EndComCode
 * @property string|null $FPM
 * @property int|null $EnterPicId
 * @property int|null $ExitPicId
 * @property string|null $LastEditUserCode
 * @property string|null $LastEditDate
 * @property string|null $Descript
 * @property float|null $EnterFromWeb
 * @property float|null $ExitFromWeb
 * @property float|null $FromWeb
 */
class IOInfo extends \yii\db\ActiveRecord {

    public $type;

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'IOInfo';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb() {


        return Yii::$app->get("db2");
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['PERNO', 'BEGINDATE', 'BEGINTIME'], 'required'],
            [['DURATION', 'BeginComCode', 'EndComCode', 'EnterFromWeb', 'ExitFromWeb', 'FromWeb'], 'number'],
            [['EnterPicId', 'ExitPicId'], 'integer'],
            [['PERNO'], 'string', 'max' => 10],
            [['BEGINDATE', 'BEGINTIME', 'ENDDATE', 'ENDTIME', 'BBEGINTIME', 'BENDDATE', 'BENDTIME', 'LastEditDate'], 'string', 'max' => 5],
            [['BEGINCLOCK', 'ENDCLOCK', 'LastEditUserCode'], 'string', 'max' => 3],
            [['FPM'], 'string', 'max' => 1],
            [['Descript'], 'string', 'max' => 255],
            [['BEGINDATE', 'BEGINTIME', 'PERNO'], 'unique', 'targetAttribute' => ['BEGINDATE', 'BEGINTIME', 'PERNO']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'PERNO' => 'Perno',
            'BEGINDATE' => 'Begindate',
            'BEGINTIME' => 'Begintime',
            'ENDDATE' => 'Enddate',
            'ENDTIME' => 'Endtime',
            'BBEGINTIME' => 'Bbegintime',
            'BENDDATE' => 'Benddate',
            'BENDTIME' => 'Bendtime',
            'BEGINCLOCK' => 'Beginclock',
            'ENDCLOCK' => 'Endclock',
            'DURATION' => 'Duration',
            'BeginComCode' => 'Begin Com Code',
            'EndComCode' => 'End Com Code',
            'FPM' => 'Fpm',
            'EnterPicId' => 'Enter Pic ID',
            'ExitPicId' => 'Exit Pic ID',
            'LastEditUserCode' => 'Last Edit User Code',
            'LastEditDate' => 'Last Edit Date',
            'Descript' => 'Descript',
            'EnterFromWeb' => 'Enter From Web',
            'ExitFromWeb' => 'Exit From Web',
            'FromWeb' => 'From Web',
        ];
    }

    /**
     * {@inheritdoc}
     * @return IOInfoQuery the active query used by this AR class.
     */
    public static function find() {
        return new IOInfoQuery(get_called_class());
    }

}
