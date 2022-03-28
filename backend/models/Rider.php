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
            [['rider_name', 'horse_name'], 'required'],
            [['hadlaju', 'jarak'], 'number'],
            [['cert_achive', 'status'], 'integer'],
            [['phone'], 'string', 'max' => 100],
            [['rider_name'], 'string', 'max' => 200],
            [['nric'], 'string', 'max' => 20],
            [['email'], 'string', 'max' => 100],
            [['address'], 'string', 'max' => 100],
            [['horse_name', 'country_born'], 'string', 'max' => 200],
            [['horse_color'], 'string', 'max' => 100],
            [['horse_gender'], 'string', 'max' => 100],
            [['kelab'], 'string', 'max' => 100],
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
            'riderName' => 'Nama Rider',
            'nric' => 'NRIC',
            'email' => 'Email',
            'address' => 'Address',
            'horseName' => 'Nama Kuda',
            'horse_dob' => 'Horse D.O.B',
            'horse_color' => 'Horse Color',
            'horseColor' => 'Warna Kuda',
            'horse_gender' => 'Horse Gender',
            'country_born' => 'Country Born',
            'kelab' => 'Kelab',
            'hadlaju' => 'Hadlaju (KM/J)',
            'jarak' => 'Jarak (KM)',
            'cert_achive' => 'Certificate of Achievement',
            'achieveText' => 'Certificate of Achievement',
            'statusText' => 'Certificate Status',
        ];
    }
    
    public function getRiderName(){
        return strtoupper($this->rider_name);
    }
    
    public function getHorseName(){
        return strtoupper($this->horse_name);
    }
    
    public function getHorseColor(){
        return strtoupper($this->horse_color);
    }
    
    public function statusList(){
        return [ 0 => 'DRAFT', 10 => 'PUBLISHED'];
    }
    
    public function achiveList(){
        return [ 0 => 'NO', 1 => 'YES'];
    }
    
    public function getStatusText(){
        $list = $this->statusList();
        if(array_key_exists($this->status, $list)){
            return $list[$this->status];
        }
    }
    
    public function getAchieveText(){
        $list = $this->achiveList();
        if(array_key_exists($this->cert_achive, $list)){
            return $list[$this->cert_achive];
        }
    }
    
}
