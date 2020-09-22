<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "allocation_detail".
 *
 * @property int $id
 * @property int|null $duration
 * @property int|null $allocationID
 * @property int|null $level_projectID
 * @property int|null $percent
 * @property string day
 *
 * @property Allocation $allocation
 * @property LevelProject $levelProject
 */
class AllocationDetail extends \yii\db\ActiveRecord {

    public $projectID;
    public $day;

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'allocation_detail';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb() {
        return Yii::$app->get('db');
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['duration', 'allocationID', 'level_projectID', 'percent'], 'integer'],
            [['allocationID', 'projectID', 'level_projectID'], 'required'],
            [['day'], 'string'],
            [['allocationID'], 'exist', 'skipOnError' => false, 'targetClass' => Allocation::className(), 'targetAttribute' => ['allocationID' => 'id']],
            [['level_projectID'], 'exist', 'skipOnError' => false, 'targetClass' => LevelProject::className(), 'targetAttribute' => ['level_projectID' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'duration' => 'Duration',
            'allocationID' => 'Allocation ID',
            'level_projectID' => 'انتخاب فاز پروژه',
            'percent' => 'درصد',
            'projectID' => 'نام پروژه ',
            'day' => 'day',
        ];
    }

    /**
     * Gets query for [[Allocation]].
     *
     * @return \yii\db\ActiveQuery|AllocationQuery
     */
    public function getAllocation() {
        return $this->hasOne(Allocation::className(), ['id' => 'allocationID']);
    }

    /**
     * Gets query for [[LevelProject]].
     *
     * @return \yii\db\ActiveQuery|LevelProjectQuery
     */
    public function getLevelProject() {
        return $this->hasOne(LevelProject::className(), ['id' => 'level_projectID']);
    }

    /**
     * {@inheritdoc}
     * @return AllocationDetailQuery the active query used by this AR class.
     */
    public static function find() {
        return new AllocationDetailQuery(get_called_class());
    }

    public static function checkExist($levelProjectID, $allocation) {

        $result = AllocationDetail::findOne(['allocationID' => $allocation, 'level_projectID' => $levelProjectID]);

        if (isset($result->id)) {

            return $result->id;
        } else {
            return false;
        }
    }

}
