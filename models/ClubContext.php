<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "club_context".
 *
 * @property int $id
 * @property int $club_id
 * @property string $disctrict
 * @property string $locality
 *
 * @property Clubs $club
 */
class ClubContext extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'club_context';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['club_id'], 'integer'],
            [['disctrict', 'locality'], 'string', 'max' => 255],
            [['club_id'], 'exist', 'skipOnError' => true, 'targetClass' => Clubs::className(), 'targetAttribute' => ['club_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'club_id' => 'Club ID',
            'disctrict' => 'Disctrict',
            'locality' => 'Locality',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClub()
    {
        return $this->hasOne(Clubs::className(), ['id' => 'club_id']);
    }

    /**
     * {@inheritdoc}
     * @return ClubContextQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ClubContextQuery(get_called_class());
    }
}
