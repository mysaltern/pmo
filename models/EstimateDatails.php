<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estimate_datails".
 *
 * @property int $id
 * @property int|null $percent
 * @property int|null $work_levelID
 * @property int|null $estimate_categoryID
 * @property int|null $profileID
 *
 * @property EstimateDate $estimateCategory
 * @property Profile $profile
 */
class EstimateDatails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estimate_datails';
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
            [['percent', 'work_levelID', 'estimate_categoryID', 'profileID'], 'integer'],
            [['estimate_categoryID'], 'exist', 'skipOnError' => true, 'targetClass' => EstimateDate::className(), 'targetAttribute' => ['estimate_categoryID' => 'id']],
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
            'percent' => 'Percent',
            'work_levelID' => 'Work Level ID',
            'estimate_categoryID' => 'Estimate Category ID',
            'profileID' => 'Profile ID',
        ];
    }

    /**
     * Gets query for [[EstimateCategory]].
     *
     * @return \yii\db\ActiveQuery|EstimateDateQuery
     */
    public function getEstimateCategory()
    {
        return $this->hasOne(EstimateDate::className(), ['id' => 'estimate_categoryID']);
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
     * @return EstimateDatailsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EstimateDatailsQuery(get_called_class());
    }
}
