<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[LevelProject]].
 *
 * @see LevelProject
 */
class LevelProjectQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return LevelProject[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return LevelProject|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
