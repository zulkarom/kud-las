<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "country".
 *
 * @property int $id
 * @property string $country_code
 * @property string $country_name
 * @property string|null $currency_code
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'country';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['country_code'], 'string', 'max' => 2],
            [['country_name'], 'string', 'max' => 45],
            [['currency_code'], 'string', 'max' => 3],
            [['country_code'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'country_code' => 'Country Code',
            'country_name' => 'Country Name',
            'currency_code' => 'Currency Code',
        ];
    }

    public static function getCountryList(){
        return ArrayHelper::map(self::find()->orderBy('country_order ASC, country_name ASC')->all(), 'country_code', 'country_name');
    }
}
