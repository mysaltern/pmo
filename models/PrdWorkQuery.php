<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[PrdWork]].
 *
 * @see PrdWork
 */
class PrdWorkQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return PrdWork[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return PrdWork|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
