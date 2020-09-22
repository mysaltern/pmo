<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "person".
 *
 * @property string $PERNO
 * @property string|null $FIRSTNAME
 * @property string|null $LASTNAME
 * @property string|null $SortLastName
 * @property string|null $PwdP
 * @property int|null $UseActiveDirectory
 * @property string|null $DomainLoginName
 * @property string|null $Theme
 * @property float|null $LoginFailedCount
 * @property string|null $PwdLastChangeDate
 * @property float|null $DefaultPwd
 * @property float|null $IsEncrypted
 * @property string|null $FirstUSDateTime
 * @property string|null $userPermission
 * @property float $PassChangePerDayCount
 * @property int $EncryptionType
 */
class Person extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'person';
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
            [['PERNO', 'PassChangePerDayCount', 'EncryptionType'], 'required'],
            [['UseActiveDirectory', 'EncryptionType'], 'integer'],
            [['LoginFailedCount', 'DefaultPwd', 'IsEncrypted', 'PassChangePerDayCount'], 'number'],
            [['PERNO', 'PwdLastChangeDate'], 'string', 'max' => 10],
            [['FIRSTNAME', 'Theme'], 'string', 'max' => 20],
            [['LASTNAME', 'SortLastName', 'PwdP'], 'string', 'max' => 30],
            [['DomainLoginName'], 'string', 'max' => 50],
            [['FirstUSDateTime'], 'string', 'max' => 15],
            [['userPermission'], 'string', 'max' => 100],
            [['PERNO'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'PERNO' => 'Perno',
            'FIRSTNAME' => 'Firstname',
            'LASTNAME' => 'Lastname',
            'SortLastName' => 'Sort Last Name',
            'PwdP' => 'Pwd P',
            'UseActiveDirectory' => 'Use Active Directory',
            'DomainLoginName' => 'Domain Login Name',
            'Theme' => 'Theme',
            'LoginFailedCount' => 'Login Failed Count',
            'PwdLastChangeDate' => 'Pwd Last Change Date',
            'DefaultPwd' => 'Default Pwd',
            'IsEncrypted' => 'Is Encrypted',
            'FirstUSDateTime' => 'First Us Date Time',
            'userPermission' => 'User Permission',
            'PassChangePerDayCount' => 'Pass Change Per Day Count',
            'EncryptionType' => 'Encryption Type',
        ];
    }

    /**
     * {@inheritdoc}
     * @return PersonQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PersonQuery(get_called_class());
    }
}
