<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "kejohanan".
 *
 * @property int $id
 * @property string $name
 * @property string|null $date_start
 * @property string|null $date_end
 * @property string|null $location
 */
class Kejohanan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kejohanan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'is_active'], 'required'],
            [['is_active'], 'integer'],
            [['date_start', 'date_end'], 'safe'],
            [['name', 'location'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'date_start' => 'Date Start',
            'date_end' => 'Date End',
            'location' => 'Location',
        ];
    }

    public static function getStatusArray(){
        return [
            0 => 'TIDAK AKTIF', 
            1 => 'AKTIF'
        ];
    }

    public static function getStatusColor(){
	    return [0 => 'danger', 1 => 'success'];
	}

    public function getStatusText(){
        $text = '';
        if(array_key_exists($this->is_active, $this->statusArray)){
            $text = $this->statusArray[$this->is_active];
        }
        return $text;
    }

    public function getStatusLabel(){
        $color = "";
        if(array_key_exists($this->is_active, $this->statusColor)){
            $color = $this->statusColor[$this->is_active];
        }
        return '<span class="badge badge-'.$color.'">'. $this->statusText .'</span>';
    }

    public static function getList(){
        return ArrayHelper::map(self::find()->all(), 'id', 'name');
    }

    public function dateStartEndFormat($long = false){
		$date1 = $this->date_start;
        $date2 = $this->date_end;
	    $day1 = date('j', strtotime($date1));
	    if($long){
	        $month_str1 = date('F', strtotime($date1));
	    }else{
	        $month_str1 = date('M', strtotime($date1));
	    }
	    $year1 = date('Y', strtotime($date1));
	    
	    $day2 = date('j', strtotime($date2));
	    if($long){
	        $month_str2 = date('F', strtotime($date2));
	    }else{
	        $month_str2 = date('M', strtotime($date2));
	    }
	    $year2 = date('Y', strtotime($date2));
	    
		if($date1 == $date2){
			return $day1 . ' '  . $month_str1 . ' ' . $year1;
		}else if($month_str1 == $month_str2){
	        if($year1 == $year2){
	            return $day1 . ' - '.$day2.' ' . $month_str1 . ' ' . $year1;
	        }else{
	            return $day1 . ' ' . $month_str1 . ' ' . $year1 . ' - '. $day2 . ' ' . $month_str2 . ' ' . $year2 ;
	        }
	        
	    }else{
	        if($year1 == $year2){
	            return $day1 . ' ' . $month_str1 . ' - '.$day2.' ' . $month_str2 . ' ' . $year1;
	        }else{
	            return $day1 . ' ' . $month_str1 . ' ' . $year1 . ' - '. $day2 . ' ' . $month_str2 . ' ' . $year2 ;
	        }
	    }
	}
}
