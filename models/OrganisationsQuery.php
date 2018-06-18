<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Organisations]].
 *
 * @see Organisations
 */
class OrganisationsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Organisations[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Organisations|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
