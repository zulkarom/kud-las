<?php

namespace backend\models;

use Yii;
use yii\base\Model;

/**
 * Signup form
 */
class VestForm extends Model
{
    public $kejohanan_id;
    public $category_id;
    public $color;
    public $type;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kejohanan_id', 'category_id', 'type'], 'integer'],
            ['color', 'string'],

           // ['nric','match','pattern'=>'[^A-Za-z0-9]+/g'],

           
        ];
    }

    public function attributeLabels()
    {
        return [
            'nric' => 'NO. KAD PENGENALAN',
        ];
    }

}
