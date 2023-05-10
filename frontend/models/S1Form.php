<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * Signup form
 */
class S1Form extends Model
{
    public $nric;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['nric', 'trim'],
            ['nric', 'string'],

            ['nric', 'required'],
            ['nric', 'string', 'min' => 3, 'max' => 12],

           // ['nric','match','pattern'=>'[^A-Za-z0-9]+/g'],

           
        ];
    }

    public function attributeLabels()
    {
        return [
            'nric' => 'NO. KAD PENGENALAN/ PASSPORT',
        ];
    }

}
