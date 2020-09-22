<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[DayWork]].
 *
 * @see DayWork
 */
class DayWorkQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return DayWork[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return DayWork|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
