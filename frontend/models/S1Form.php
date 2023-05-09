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
            ['nric', 'number'],
            ['nric', 'required'],
            ['nric', 'string', 'min' => 2, 'max' => 20],

           
        ];
    }

    public function attributeLabels()
    {
        return [
            'nric' => 'NO. KAD PENGENALAN',
        ];
    }

}
