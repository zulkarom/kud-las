<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string $category_name
 * @property int $is_enabled
 *
 * @property Competition[] $competitions
 */
class Category extends \yii\db\ActiveRecord
{
    public $count_assigned;
    public $count_unassigned;
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_name', 'is_enabled'], 'required'],
            [['is_enabled'], 'integer'],
            [['category_name', 'color'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_name' => 'Category Name',
            'is_enabled' => 'Is Enabled',
        ];
    }

    public static function getStatusArray(){
        return [
            0 => 'NO', 
            1 => 'YES'
        ];
    }

    public static function getStatusColor(){
	    return [0 => 'danger', 1 => 'success'];
	}

    public function getStatusText(){
        $text = '';
        if(array_key_exists($this->is_enabled, $this->statusArray)){
            $text = $this->statusArray[$this->is_enabled];
        }
        return $text;
    }

    public function getStatusLabel(){
        $color = "";
        if(array_key_exists($this->is_enabled, $this->statusColor)){
            $color = $this->statusColor[$this->is_enabled];
        }
        return '<span class="badge badge-'.$color.'">'. $this->statusText .'</span>';
    }

    public function colorCode(){
        $code = Vest::getColorCodeArray();
        $color = Vest::getColorArray();
       switch($this->color){
            case $color[0];
                return $code[0];
            break;
            case $color[1];
                return $code[1];
            break;
            case $color[2];
                return $code[2];
            break;
       }
       return '';
    }

    public function getColorLabel(){
        return '<span style="padding:5px;color:white;font-size:13px;background-color:'.$this->colorCode().'">'. $this->color .'</span>';
    }

    /**
     * Gets query for [[Competitions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompetitions()
    {
        return $this->hasMany(Participant::className(), ['category_id' => 'id']);
    }

    public static function getCategoryList(){
        return ArrayHelper::map(self::find()->where(['is_enabled' => 1])->all(), 'id', 'category_name');
    }

    public static function getCategoryListAll(){
        return ArrayHelper::map(self::find()->all(), 'id', 'category_name');
    }
}
