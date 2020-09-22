<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[EstimateDate]].
 *
 * @see EstimateDate
 */
class EstimateDateQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return EstimateDate[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return EstimateDate|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
