<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Rrule]].
 *
 * @see Rrule
 */
class RruleQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Rrule[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Rrule|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
