<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "rider".
 *
 * @property int $id
 * @property string|null $rider_name
 * @property string|null $nric
 * @property string|null $email
 * @property string|null $address
 * @property string|null $phone
 * @property string|null $kelab
 *
 * @property Competition[] $competitions
 */
class Rider extends \yii\db\ActiveRecord
{
    public $nric_show;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rider';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rider_name', 'address', 'phone', 'kelab'], 'required'],

            [['rider_name', 'email', 'address', 'phone', 'kelab'], 'string', 'max' => 200],
            [['nric'], 'string', 'max' => 20],

            [['email'], 'trim'],
            [['email'], 'email'],
            [['nric'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'rider_name' => 'Nama Penuh Rider',
            'nric' => 'No. Kad Pengenalan',
            'email' => 'Email',
            'address' => 'Alamat',
            'phone' => 'No. Telefon',
            'kelab' => 'Kelab/Stable',
        ];
    }

    /**
     * Gets query for [[Competitions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompetitions()
    {
        return $this->hasMany(Competition::className(), ['rider_id' => 'id']);
    }
}
