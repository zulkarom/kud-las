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
            [['horse_name', 'horse_color', 'horse_gender', 'horse_dob'], 'required'],
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
            'eam_id' => 'No. EAM',
            'horse_code' => 'eKudaLasak ID',
            'horse_name' => 'Nama Kuda',
            'horse_dob' => 'Tarikh Lahir Kuda',
            'horse_color' => 'Warna Kuda',
            'horse_gender' => 'Jantina Kuda',
            'country_born' => 'Negara Kelahiran Kuda',
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
