<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "profile".
 *
 * @property int $id
 * @property string|null $personal_code
 * @property string|null $name
 * @property string|null $last_name
 * @property int|null $category_workID
 * @property int|null $userID
 *
 * @property Allocation[] $allocations
 * @property Availability[] $availabilities
 * @property EstimateDatails[] $estimateDatails
 * @property EstimateDate[] $estimateDates
 * @property WorkCategory $categoryWork
 * @property User $user
 */
class Profile extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'profile';
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
            [['personal_code', 'name', 'last_name'], 'string'],
            [['category_workID', 'userID'], 'integer'],
            [['category_workID'], 'exist', 'skipOnError' => true, 'targetClass' => WorkCategory::className(), 'targetAttribute' => ['category_workID' => 'id']],
            [['userID'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['userID' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'personal_code' => 'Personal Code',
            'name' => 'Name',
            'last_name' => 'Last Name',
            'category_workID' => 'Category Work ID',
            'userID' => 'User ID',
        ];
    }

    /**
     * Gets query for [[Allocations]].
     *
     * @return \yii\db\ActiveQuery|AllocationQuery
     */
    public function getAllocations() {
        return $this->hasMany(Allocation::className(), ['profileID' => 'id']);
    }

    /**
     * Gets query for [[Availabilities]].
     *
     * @return \yii\db\ActiveQuery|AvailabilityQuery
     */
    public function getAvailabilities() {
        return $this->hasMany(Availability::className(), ['profileID' => 'id']);
    }

    /**
     * Gets query for [[EstimateDatails]].
     *
     * @return \yii\db\ActiveQuery|EstimateDatailsQuery
     */
    public function getEstimateDatails() {
        return $this->hasMany(EstimateDatails::className(), ['profileID' => 'id']);
    }

    /**
     * Gets query for [[EstimateDates]].
     *
     * @return \yii\db\ActiveQuery|EstimateDateQuery
     */
    public function getEstimateDates() {
        return $this->hasMany(EstimateDate::className(), ['profileID' => 'id']);
    }

    /**
     * Gets query for [[CategoryWork]].
     *
     * @return \yii\db\ActiveQuery|WorkCategoryQuery
     */
    public function getCategoryWork() {
        return $this->hasOne(WorkCategory::className(), ['id' => 'category_workID']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery|UserQuery
     */
    public function getUser() {
        return $this->hasOne(User::className(), ['id' => 'userID']);
    }

    /**
     * {@inheritdoc}
     * @return ProfileQuery the active query used by this AR class.
     */
    public static function find() {
        return new ProfileQuery(get_called_class());
    }

    public static function information($userID) {


        $data = Profile::find()->select('*,profile.id as profileID')->where(['userID' => $userID])->innerJoin('user', '`user`.`id` = `profile`.`userID`')->asArray()->all();
        if ($data == NULL) {
            return false;
        }


        return $data;
    }

    public static function nameLastName($userID) {

        if ($userID == NULL) {
            return 'ناشناس';
        }

        $data = Profile::find()->select('name,last_name')->where(['userID' => $userID])->asArray()->one();
        if ($data == NULL) {
            return false;
        }
        $info = $data['name'] . ' ' . $data['last_name'];

        return $info;
    }

}
