<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Clubs]].
 *
 * @see Clubs
 */
class ClubsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Clubs[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Clubs|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
