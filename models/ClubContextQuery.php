<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ClubContext]].
 *
 * @see ClubContext
 */
class ClubContextQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return ClubContext[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return ClubContext|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
