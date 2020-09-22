<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Allocation]].
 *
 * @see Allocation
 */
class AllocationQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Allocation[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Allocation|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
