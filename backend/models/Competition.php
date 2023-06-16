<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "competition".
 *
 * @property int $id
 * @property int $kejohanan_id
 * @property int $category_id
 * @property int|null $rider_id
 * @property int|null $horse_id
 * @property float $hadlaju
 * @property float $jarak
 * @property int $cert_achive
 * @property int $status
 * @property string|null $register_at
 * @property int $register_status
 *
 * @property Category $category
 * @property Horse $horse
 * @property Rider $rider
 */
class Competition extends \yii\db\ActiveRecord
{
    public $vest_no;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'competition';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kejohanan_id', 'rider_id'], 'required'],
            [['category_id', 'rider_size'], 'required', 'on' => 'kejohanan'],

            [['kejohanan_id', 'category_id', 'rider_id', 'horse_id', 'cert_achive', 'status', 'register_status', 'vest_id', 'deposit_paid'], 'integer'],

            [['hadlaju', 'jarak'], 'number'],
            [['register_at'], 'safe'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['rider_id'], 'exist', 'skipOnError' => true, 'targetClass' => Rider::className(), 'targetAttribute' => ['rider_id' => 'id']],
            [['horse_id'], 'exist', 'skipOnError' => true, 'targetClass' => Horse::className(), 'targetAttribute' => ['horse_id' => 'id']],
            [['rider_size'], 'string'],

            [['vest_id'], 'unique'],

            [['category_id'], 'validateCategory'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kejohanan_id' => 'Kejohanan ID',
            'category_id' => 'Kategori Kejohanan',
            'rider_id' => 'Rider ID',
            'horse_id' => 'Horse ID',
            'hadlaju' => 'Hadlaju',
            'jarak' => 'Jarak',
            'cert_achive' => 'Cert Achive',
            'status' => 'Status',
            'register_at' => 'Register At',
            'register_status' => 'Status',
            'rider_size' => 'Saiz Baju',
            'vest_id' => 'Vest No.',
        ];
    }

    public function validateCategory($attribute, $params, $validator)
    {
        $c = Competition::find()
        ->where(['rider_id' => $this->rider_id, 'kejohanan_id' => $this->kejohanan_id, 'category_id' => $this->category_id])
        ->andWhere(['<>', 'id', $this->id])
        ->one();
        if($c){
            $this->addError($attribute, 'Satu Rider tidak boleh mendaftar dua kali kategori yang sama!');
        }else{
            $h = Competition::find()
            ->where(['horse_id' => $this->horse_id, 'kejohanan_id' => $this->kejohanan_id, 'category_id' => $this->category_id])
            ->andWhere(['<>', 'id', $this->id])
            ->one();
            if($h){
                $this->addError($attribute, 'Satu Kuda tidak boleh mendaftar dua kali kategori yang sama!');
            }
        } 
    }

    public static function getStatusArray(){
        return [
            0 => 'DRAFT', 
            10 => 'WITHDRAW',
            100 => 'SUBMIT'
        ];
    }

    public static function getStatusColor(){
	    return [0 => 'danger', 10 => 'warning', 100 => 'success'];
	}

    public function getStatusText(){
        $text = '';
        if(array_key_exists($this->register_status, $this->statusArray)){
            $text = $this->statusArray[$this->register_status];
        }
        return $text;
    }

    public function getStatusLabel(){
        $color = "";
        if(array_key_exists($this->register_status, $this->statusColor)){
            $color = $this->statusColor[$this->register_status];
        }
        return '<span class="badge badge-'.$color.'">'. $this->statusText .'</span>';
    }

    

    public static function getPaidArray(){
        return [
            0 => 'UNPAID', 
            1 => 'PAID'
        ];
    }

    public static function getPaidColor(){
	    return [0 => 'danger', 100 => 'success'];
	}

    public function getPaidText(){
        $text = '';
        if(array_key_exists($this->deposit_paid, $this->statusArray)){
            $text = $this->statusArray[$this->deposit_paid];
        }
        return $text;
    }

    public function getPaidLabel(){
        $color = "";
        if(array_key_exists($this->deposit_paid, $this->statusColor)){
            $color = $this->statusColor[$this->deposit_paid];
        }
        return '<span class="badge badge-'.$color.'">'. $this->statusText .'</span>';
    }


    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * Gets query for [[Horse]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHorse()
    {
        return $this->hasOne(Horse::className(), ['id' => 'horse_id']);
    }

    public function getVest()
    {
        return $this->hasOne(Vest::className(), ['id' => 'vest_id']);
    }

    public function getKejohanan()
    {
        return $this->hasOne(Kejohanan::className(), ['id' => 'kejohanan_id']);
    }

    /**
     * Gets query for [[Rider]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRider()
    {
        return $this->hasOne(Rider::className(), ['id' => 'rider_id']);
    }

    public static function getDepositArray(){
        return [
            0 => 'NO', 
            1 => 'YES',
            2 => 'RETURN',
        ];
    }

    public function getDepositText(){
        $text = '';
        if(array_key_exists($this->deposit_paid, $this->depositArray)){
            $text = $this->depositArray[$this->deposit_paid];
        }
        return $text;
    }

    public static function getDepositColor(){
	    return [0 => 'danger', 1 => 'success', 2 => 'primary'];
	}

    public function getDepositLabel(){
        $color = "";
        if(array_key_exists($this->deposit_paid, $this->depositColor)){
            $color = $this->depositColor[$this->deposit_paid];
        }
        return '<span class="badge badge-'.$color.'">'. $this->depositText .'</span>';
    }

    public function getListSize(){
        $size = ['XS', 'S', 'M','L', 'XL', 'XXL'];
        $a=[];
        foreach($size as $s){
        $a[$s] = $s;
        }
        return $a;
    }
}
