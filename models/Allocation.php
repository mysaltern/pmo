<?php

namespace app\models;

use Yii;
use hoomanMirghasemi\jdf\Jdf;

/**
 * This is the model class for table "allocation".
 *
 * @property int $id
 * @property string|null $date
 * @property int|null $profileID
 *
 * @property Profile $profile
 * @property AllocationDetail[] $allocationDetails
 */
class Allocation extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'allocation';
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
            [['date'], 'safe'],
            [['profileID'], 'integer'],
            [['profileID'], 'exist', 'skipOnError' => true, 'targetClass' => Profile::className(), 'targetAttribute' => ['profileID' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'profileID' => 'Profile ID',
        ];
    }

    /**
     * Gets query for [[Profile]].
     *
     * @return \yii\db\ActiveQuery|ProfileQuery
     */
    public function getProfile() {
        return $this->hasOne(Profile::className(), ['id' => 'profileID']);
    }

    /**
     * Gets query for [[AllocationDetails]].
     *
     * @return \yii\db\ActiveQuery|AllocationDetailQuery
     */
    public function getAllocationDetails() {
        return $this->hasMany(AllocationDetail::className(), ['allocationID' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return AllocationQuery the active query used by this AR class.
     */
    public static function find() {
        return new AllocationQuery(get_called_class());
    }

    public static function getWithCondition($profileID, $date) {


        $data = Allocation::find()->select(['allocation.id', 'sum(percent) as sum'])->where(['profileID' => $profileID])->andWhere(['between', 'date', $date . " 00:00:00", $date . " 23:59:59"])->leftJoin('allocation_detail', '`allocation_detail`.`allocationID` = `allocation`.`id`')->groupBy('allocation.id')->asArray()->one();
        return $data;
    }

    public static function getWithConditionDetails($endTime, $limit, $profileID) {


        $startTime = $endTime - ($limit * 86400);
        $startTime = Jdf::jdate('Y/n/j', $startTime);
        $startTime = Yii::$app->mycomponent->convertPersianNumbersToEnglish($startTime);

        $endTime = Jdf::jdate('Y/n/j', $endTime);
        $endTime = Yii::$app->mycomponent->convertPersianNumbersToEnglish($endTime);


        $data = Allocation::find()->select('*')->where(['profileID' => $profileID])->andWhere(['between', 'date', $startTime . " 00:00:00", $endTime . " 23:59:59"])->innerJoin('allocation_detail', '`allocation_detail`.`allocationID` = `allocation`.`id`')->groupBy('allocation_detail.id')->asArray()->all();

        return $data;
    }

}
