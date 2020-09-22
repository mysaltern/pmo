<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[AllocationDetail]].
 *
 * @see AllocationDetail
 */
class AllocationDetailQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return AllocationDetail[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return AllocationDetail|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
