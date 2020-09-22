<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "level_project".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $level
 * @property int|null $projectID
 * @property int|null $parentID
 *
 * @property AllocationDetail[] $allocationDetails
 * @property Availability[] $availabilities
 * @property Project $project
 * @property LevelProject $parent
 * @property LevelProject[] $levelProjects
 */
class LevelProject extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'level_project';
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
            [['name'], 'string'],
//            [['projectID', 'name', 'level', 'parentID'], 'required'],
            [['level', 'projectID', 'parentID'], 'integer'],
            [['projectID'], 'exist', 'skipOnError' => false, 'targetClass' => Project::className(), 'targetAttribute' => ['projectID' => 'id']],
            [['parentID'], 'exist', 'skipOnError' => false, 'targetClass' => LevelProject::className(), 'targetAttribute' => ['parentID' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'نام فاز پروژه',
            'level' => 'Level',
            'projectID' => 'Project ID',
            'parentID' => 'Parent ID',
        ];
    }

    /**
     * Gets query for [[AllocationDetails]].
     *
     * @return \yii\db\ActiveQuery|AllocationDetailQuery
     */
    public function getAllocationDetails() {
        return $this->hasMany(AllocationDetail::className(), ['level_projectID' => 'id']);
    }

    /**
     * Gets query for [[Availabilities]].
     *
     * @return \yii\db\ActiveQuery|AvailabilityQuery
     */
    public function getAvailabilities() {
        return $this->hasMany(Availability::className(), ['levelID' => 'id']);
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
     * Gets query for [[Parent]].
     *
     * @return \yii\db\ActiveQuery|LevelProjectQuery
     */
    public function getParent() {
        return $this->hasOne(LevelProject::className(), ['id' => 'parentID']);
    }

    /**
     * Gets query for [[LevelProjects]].
     *
     * @return \yii\db\ActiveQuery|LevelProjectQuery
     */
    public function getLevelProjects() {
        return $this->hasMany(LevelProject::className(), ['parentID' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return LevelProjectQuery the active query used by this AR class.
     */
    public static function find() {
        return new LevelProjectQuery(get_called_class());
    }

    public static function getWtihProject($cat) {


        $items = LevelProject::find()->where(['projectID' => $cat])->asArray()->all();
        return $items;
    }

    public static function getAccess($userID, $accessCheck, $cat_project = FALSE) {


        $list = [];
        $list['project'] = '';

//        $data = Availability::find()->select([ '*', 'availability.id', 'availability.projectID', 'type', 'category_workID'])->where(['profileID' => $userID])->leftJoin('level_project', '`level_project`.`id` = `availability`.`levelID`')->asArray()->all();

        if ($cat_project != false) {
            $data = Availability::find()->select([ '*', 'project.name as project_name', 'level_project.name as level_name', 'availability.id', 'availability.projectID', 'type', 'category_workID'])->where(['availability.projectID' => $cat_project])->leftJoin('level_project', '`level_project`.`id` = `availability`.`levelID`')->leftJoin('project', '`project`.`id` = `availability`.`projectID`')->asArray()->all();
        } else {
            $data = Availability::find()->select([ '*', 'project.name as project_name', 'level_project.name as level_name', 'availability.id', 'availability.projectID', 'type', 'category_workID'])->leftJoin('level_project', '`level_project`.`id` = `availability`.`levelID`')->leftJoin('project', '`project`.`id` = `availability`.`projectID`')->asArray()->all();
        }



        $project = [];

        $x = -1;

        foreach ($data as $item) {

            $x++;
            if ($item['type'] == 1 and $item['profileID'] == $userID) {
                $project[$x]['group'] = false;
                $project[$x]['project'] = $item['projectID'];
                $project[$x]['name'] = $item['project_name'];
                if (isset($item['levelID'])) {

                    $project[$x]['level'] = $item['levelID'];
                    $project[$x]['level_name'] = $item['level_name'];
                }
            } else {


                if ($item['type'] == 2 and $accessCheck != false) {

                    if ($item['category_workID'] === $accessCheck[0]['category_workID']) {


                        $project[$x]['group'] = true;
                        $project[$x]['project'] = $item['projectID'];
                        $project[$x]['name'] = $item['project_name'];
                        if (isset($item['levelID'])) {

                            $project[$x]['level'] = $item['levelID'];
                            $project[$x]['level_name'] = $item['level_name'];
                        }
                    }
                }
            }
        }


        return $project;
    }

}
