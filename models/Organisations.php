<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "organisations".
 *
 * @property int $id
 * @property string $name
 *
 * @property Clubs[] $clubs
 */
class Organisations extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'organisations';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'clubs' => 'Клубы'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClubs()
    {
        return $this->hasMany(Clubs::className(), ['org_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return OrganisationsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OrganisationsQuery(get_called_class());
    }
}
