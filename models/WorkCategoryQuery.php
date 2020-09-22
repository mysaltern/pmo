<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[WorkCategory]].
 *
 * @see WorkCategory
 */
class WorkCategoryQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return WorkCategory[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return WorkCategory|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
