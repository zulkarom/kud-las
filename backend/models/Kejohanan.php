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
            [['name'], 'required'],
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

    public static function getList(){
        return ArrayHelper::map(self::find()->all(), 'id', 'name');
    }
}
