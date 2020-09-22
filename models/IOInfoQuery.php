<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[IOInfo]].
 *
 * @see IOInfo
 */
class IOInfoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return IOInfo[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return IOInfo|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
