<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "horse".
 *
 * @property int $id
 * @property string|null $eam_id
 * @property string|null $horse_code
 * @property string|null $horse_name
 * @property string|null $horse_dob
 * @property string|null $horse_color
 * @property string|null $horse_gender
 * @property string|null $country_born
 *
 * @property Competition[] $competitions
 */
class Horse extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'horse';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['horse_dob'], 'safe'],
            [['eam_id', 'horse_code'], 'string', 'max' => 255],
            [['horse_name', 'horse_color', 'horse_gender', 'country_born'], 'string', 'max' => 200],
            [['eam_id'], 'unique'],
            [['horse_code'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'eam_id' => 'Eam ID',
            'horse_code' => 'Horse Code',
            'horse_name' => 'Horse Name',
            'horse_dob' => 'Horse Dob',
            'horse_color' => 'Horse Color',
            'horse_gender' => 'Horse Gender',
            'country_born' => 'Country Born',
        ];
    }

    /**
     * Gets query for [[Competitions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompetitions()
    {
        return $this->hasMany(Competition::className(), ['horse_id' => 'id']);
    }
}
