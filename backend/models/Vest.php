<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "vest".
 *
 * @property int $id
 * @property int $vest_no
 * @property string $color
 * @property int $status
 * @property int|null $competition_id
 */
class Vest extends \yii\db\ActiveRecord
{
    public $competition_id;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vest';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['vest_no', 'color', 'status'], 'required'],
            [['vest_no', 'status', 'competition_id'], 'integer'],
            [['color'], 'string', 'max' => 100],
            [['competition_id'], 'unique'],

            [['vest_no', 'color'], 'unique', 'targetAttribute' => ['vest_no', 'color']]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'vest_no' => 'Vest No',
            'color' => 'Color',
            'status' => 'Status',
            'competition_id' => 'Rider',
        ];
    }

    public static function getColorArray(){
        return ['Purple', 'Hitam', 'Baby Blue'];
    }

    public static function getColorCodeArray(){
        return ['#A020F0', '#000000', '#89CFF0'];
    }

    public static function listColors(){
        $list = self::getColorArray();
        $array = [];
        foreach($list as $l){
            $array[$l] = $l;
        }
        return $array;
    }

    public function colorCode(){
        $code = $this->getColorCodeArray();
       switch($this->color){
            case $this->colorArray[0];
                return $code[0];
            break;
            case $this->colorArray[1];
                return $code[1];
            break;
            case $this->colorArray[2];
                return $code[2];
            break;
       }
       return '';
    }

    public function getColorLabel(){
        return '<span style="padding:5px;color:white;font-size:13px;background-color:'.$this->colorCode().'">'. $this->color .'</span>';
    }

    public static function getStatusArray(){
        return [
            1 => 'GOOD', 
            0 => 'DAMAGED/MISSING',
        ];
    }

    public static function getStatusColor(){
	    return [0 => 'danger', 1 => 'success'];
	}

    public function getStatusText(){
        $text = '';
        if(array_key_exists($this->status, $this->statusArray)){
            $text = $this->statusArray[$this->status];
        }
        return $text;
    }

    public function getStatusLabel(){
        $color = "";
        if(array_key_exists($this->status, $this->statusColor)){
            $color = $this->statusColor[$this->status];
        }
        return '<span class="badge badge-'.$color.'">'. $this->statusText .'</span>';
    }

    public function getCompetition()
    {
        return $this->hasOne(Competition::className(), ['vest_id' => 'id']);
    }
}
