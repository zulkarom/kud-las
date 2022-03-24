<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "rider".
 *
 * @property int $id
 * @property string|null $phone
 * @property string|null $rider_name
 * @property string|null $nric
 * @property string|null $email
 * @property string|null $address
 * @property string|null $horse_name
 * @property string|null $horse_dob
 * @property string|null $horse_color
 * @property string|null $horse_gender
 * @property string|null $country_born
 * @property string|null $kelab
 * @property float $hadlaju
 * @property float $jarak
 * @property int $cert_achive
 * @property int $status
 */
class Rider extends \yii\db\ActiveRecord
{
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
            [['horse_dob'], 'safe'],
            [['hadlaju', 'jarak'], 'required'],
            [['hadlaju', 'jarak'], 'number'],
            [['cert_achive', 'status'], 'integer'],
            [['phone'], 'string', 'max' => 11],
            [['rider_name'], 'string', 'max' => 36],
            [['nric'], 'string', 'max' => 12],
            [['email'], 'string', 'max' => 26],
            [['address'], 'string', 'max' => 72],
            [['horse_name', 'country_born'], 'string', 'max' => 16],
            [['horse_color'], 'string', 'max' => 13],
            [['horse_gender'], 'string', 'max' => 17],
            [['kelab'], 'string', 'max' => 78],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'phone' => 'Phone',
            'rider_name' => 'Rider Name',
            'nric' => 'Nric',
            'email' => 'Email',
            'address' => 'Address',
            'horse_name' => 'Horse Name',
            'horse_dob' => 'Horse Dob',
            'horse_color' => 'Horse Color',
            'horse_gender' => 'Horse Gender',
            'country_born' => 'Country Born',
            'kelab' => 'Kelab',
            'hadlaju' => 'Hadlaju',
            'jarak' => 'Jarak',
            'cert_achive' => 'Cert Achive',
            'status' => 'Status',
        ];
    }
}
