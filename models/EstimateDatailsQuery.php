<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[EstimateDatails]].
 *
 * @see EstimateDatails
 */
class EstimateDatailsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return EstimateDatails[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return EstimateDatails|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
