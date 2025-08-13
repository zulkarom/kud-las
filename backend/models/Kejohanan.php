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
    public $cert_instance;
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
            [['name', 'is_active','date_start', 'date_end', 'location'], 'required'],
            [['is_active'], 'integer'],
            [['deposit_amount'], 'number'],
            [['date_start', 'date_end', 'date_vest', 'cert_publish_at', 'reg_start', 'reg_end',], 'safe'],
            [['name', 'location', 'cert_participant'], 'string', 'max' => 200],

            [['cert_instance'], 'file',
            'maxSize' => 1024 * 1024 * 3, // 3MB
            'extensions' => 'gif, jpg, png', 
            'mimeTypes' => 'image/gif, image/jpeg, image/png',
            ],
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
            'reg_start' => 'Registration Start',
            'reg_end' => 'Registration End',
            'location' => 'Location',
            'cert_instance' => 'Participant Cert Template',
            'date_vest' => 'Vest No. Release Date',
            'cert_publish_at' => 'Certificate Release Date'
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

    public function canRegister(){
        if($this->reg_start){
            date_default_timezone_set("Asia/Kuala_Lumpur");
            $start = strtotime($this->reg_start);
            $end = strtotime($this->reg_end . ' 23:59:59');
            if($start <= time() && $end >= time()){
                return true;
            }
        }
        return false;
    }

    public function getCerts()
    {
        return $this->hasMany(KejohananCert::className(), ['kejohanan_id' => 'id']);
    }

    public function countCategories(){
        $kira = KejohananCert::find()
        ->where(['kejohanan_id' => $this->id])
        ->count();
        return $kira ? $kira : 0;
    }

    public function countAchieve($achieve = 1){
        $kira = Participant::find()
        ->where(['kejohanan_id' => $this->id, 'cert_achive' => $achieve, 'register_status' => 100])
        ->count();
        return $kira ? $kira : 0;
    }

    public function dateStartEndFormat($long = false){
		$date1 = $this->date_start;
        $date2 = $this->date_end;
        return $this->startEnd($date1, $date2);
	    
	}

    public function registrationStartEnd($long = false){
		$date1 = $this->reg_start;
        $date2 = $this->reg_end;
        return $this->startEnd($date1, $date2);
	    
	}

    public static function countByCategory($cat){
        $kira = Kejohanan::find()->where(['category_id' => $cat])->count();
        return $kira ? $kira : 0;
    }

    

    public function countParticipantByStatus($status){
        $kira = Participant::find()
        ->where(['register_status' => $status, 'kejohanan_id' => $this->id])
        ->count();
        return $kira ? $kira : 0;
    }

    private function startEnd($date1, $date2, $long = false){
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

    public function flashError(){
            if($this->getErrors()){
                foreach($this->getErrors() as $error){
                    if($error){
                        foreach($error as $e){
                            Yii::$app->session->addFlash('error', $e);
                        }
                    }
                }
            }
    
        }
}
