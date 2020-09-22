<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[WebSection]].
 *
 * @see WebSection
 */
class WebSectionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return WebSection[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return WebSection|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
