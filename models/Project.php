<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "project".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $start_date
 * @property int|null $end_date
 * @property int|null $active
 *
 * @property Availability[] $availabilities
 * @property LevelProject[] $levelProjects
 */
class Project extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project';
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
            [['start_date', 'end_date', 'active'], 'integer'],
            [['name'], 'string', 'max' => 11],
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
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'active' => 'Active',
        ];
    }

    /**
     * Gets query for [[Availabilities]].
     *
     * @return \yii\db\ActiveQuery|AvailabilityQuery
     */
    public function getAvailabilities()
    {
        return $this->hasMany(Availability::className(), ['projectID' => 'id']);
    }

    /**
     * Gets query for [[LevelProjects]].
     *
     * @return \yii\db\ActiveQuery|LevelProjectQuery
     */
    public function getLevelProjects()
    {
        return $this->hasMany(LevelProject::className(), ['projectID' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return ProjectQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProjectQuery(get_called_class());
    }
}
