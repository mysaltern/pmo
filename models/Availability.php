<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "availability".
 *
 * @property int $id
 * @property int|null $category_workID
 * @property int|null $levelID
 * @property int|null $projectID
 * @property int|null $type
 * @property int|null $profileID
 *
 * @property WorkCategory $categoryWork
 * @property Project $project
 * @property Profile $profile
 * @property LevelProject $level
 */
class Availability extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'availability';
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
            [['category_workID', 'levelID', 'projectID', 'type', 'profileID'], 'integer'],
            [['levelID'], 'required'],
            [['category_workID'], 'exist', 'skipOnError' => true, 'targetClass' => WorkCategory::className(), 'targetAttribute' => ['category_workID' => 'id']],
            [['projectID'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['projectID' => 'id']],
            [['profileID'], 'exist', 'skipOnError' => true, 'targetClass' => Profile::className(), 'targetAttribute' => ['profileID' => 'id']],
            [['levelID'], 'exist', 'skipOnError' => true, 'targetClass' => LevelProject::className(), 'targetAttribute' => ['levelID' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'category_workID' => 'Category Work ID',
            'levelID' => 'Level ID',
            'projectID' => 'Project ID',
            'type' => 'Type',
            'profileID' => 'Profile ID',
        ];
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
     * Gets query for [[Project]].
     *
     * @return \yii\db\ActiveQuery|ProjectQuery
     */
    public function getProject() {
        return $this->hasOne(Project::className(), ['id' => 'projectID']);
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
     * Gets query for [[Level]].
     *
     * @return \yii\db\ActiveQuery|LevelProjectQuery
     */
    public function getLevel() {
        return $this->hasOne(LevelProject::className(), ['id' => 'levelID']);
    }

    /**
     * {@inheritdoc}
     * @return AvailabilityQuery the active query used by this AR class.
     */
    public static function find() {
        return new AvailabilityQuery(get_called_class());
    }

}
