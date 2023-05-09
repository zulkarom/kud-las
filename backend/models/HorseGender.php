<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "horse_gender".
 *
 * @property int $id
 * @property string $gender_name
 * @property string $description
 */
class HorseGender extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'horse_gender';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gender_name', 'description'], 'required'],
            [['gender_name', 'description'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'gender_name' => 'Gender Name',
            'description' => 'Description',
        ];
    }

    public function getTextGender(){
        return $this->gender_name . ' ('.$this->description.')';
    }

    public static function getGenderList(){
        return ArrayHelper::map(self::find()->all(), 'id', 'textGender');
    }
}
