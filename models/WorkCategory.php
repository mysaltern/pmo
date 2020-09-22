<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "work_category".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $use_default
 * @property string|null $code_category
 *
 * @property Availability[] $availabilities
 * @property Profile[] $profiles
 */
class WorkCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'work_category';
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
            [['name'], 'string'],
            [['use_default'], 'integer'],
            [['code_category'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'use_default' => 'Use Default',
            'code_category' => 'Code Category',
        ];
    }

    /**
     * Gets query for [[Availabilities]].
     *
     * @return \yii\db\ActiveQuery|AvailabilityQuery
     */
    public function getAvailabilities()
    {
        return $this->hasMany(Availability::className(), ['category_workID' => 'id']);
    }

    /**
     * Gets query for [[Profiles]].
     *
     * @return \yii\db\ActiveQuery|ProfileQuery
     */
    public function getProfiles()
    {
        return $this->hasMany(Profile::className(), ['category_workID' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return WorkCategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new WorkCategoryQuery(get_called_class());
    }
}
