<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estimate_date".
 *
 * @property int $id
 * @property string|null $date
 * @property int|null $status
 * @property int|null $profileID
 *
 * @property EstimateDatails[] $estimateDatails
 * @property Profile $profile
 */
class EstimateDate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estimate_date';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date'], 'safe'],
            [['status', 'profileID'], 'integer'],
            [['profileID'], 'exist', 'skipOnError' => true, 'targetClass' => Profile::className(), 'targetAttribute' => ['profileID' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'status' => 'Status',
            'profileID' => 'Profile ID',
        ];
    }

    /**
     * Gets query for [[EstimateDatails]].
     *
     * @return \yii\db\ActiveQuery|EstimateDatailsQuery
     */
    public function getEstimateDatails()
    {
        return $this->hasMany(EstimateDatails::className(), ['estimate_categoryID' => 'id']);
    }

    /**
     * Gets query for [[Profile]].
     *
     * @return \yii\db\ActiveQuery|ProfileQuery
     */
    public function getProfile()
    {
        return $this->hasOne(Profile::className(), ['id' => 'profileID']);
    }

    /**
     * {@inheritdoc}
     * @return EstimateDateQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EstimateDateQuery(get_called_class());
    }
}
