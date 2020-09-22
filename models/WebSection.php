<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "webSection".
 *
 * @property int $id
 * @property string|null $sectionCode
 * @property string|null $sectionName
 * @property string|null $perno
 * @property int|null $MorApproveCode
 * @property int|null $MamApproveCode
 * @property int|null $IOApproveCode
 * @property int|null $ExtraWorkApproveCode
 * @property string|null $adminPermission
 * @property int|null $isManager
 * @property int|null $PatternId
 */
class WebSection extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'webSection';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db4');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['MorApproveCode', 'MamApproveCode', 'IOApproveCode', 'ExtraWorkApproveCode', 'isManager', 'PatternId'], 'integer'],
            [['sectionCode'], 'string', 'max' => 30],
            [['sectionName'], 'string', 'max' => 500],
            [['perno'], 'string', 'max' => 10],
            [['adminPermission'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sectionCode' => 'Section Code',
            'sectionName' => 'Section Name',
            'perno' => 'Perno',
            'MorApproveCode' => 'Mor Approve Code',
            'MamApproveCode' => 'Mam Approve Code',
            'IOApproveCode' => 'Io Approve Code',
            'ExtraWorkApproveCode' => 'Extra Work Approve Code',
            'adminPermission' => 'Admin Permission',
            'isManager' => 'Is Manager',
            'PatternId' => 'Pattern ID',
        ];
    }

    /**
     * {@inheritdoc}
     * @return WebSectionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new WebSectionQuery(get_called_class());
    }
}
