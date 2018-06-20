<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clubs".
 *
 * @property int $id
 * @property string $name
 * @property string $address
 * @property int $org_id
 *
 * @property Organisations $org
 */
class Clubs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clubs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'address', 'org_id'], 'required'],
            [['org_id'], 'integer'],
            [['district'], 'string'],
            [['name', 'address'], 'string', 'max' => 255],
            [['org_id'], 'exist', 'skipOnError' => true, 'targetClass' => Organisations::className(), 'targetAttribute' => ['org_id' => 'id']],
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
            'district' => 'Округ',
            'address' => 'Адрес',
            'org_id' => 'Org ID',
        ];
    }



    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganisation()
    {

        return $this->hasOne(Organisations::className(), ['id' => 'org_id']);

    } // end function



    /**
     * {@inheritdoc}
     * @return ClubsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ClubsQuery(get_called_class());
    }
}
