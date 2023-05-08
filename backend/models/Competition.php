<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "competition".
 *
 * @property int $id
 * @property int $kejohanan_id
 * @property int $category_id
 * @property int|null $rider_id
 * @property int|null $horse_id
 * @property float $hadlaju
 * @property float $jarak
 * @property int $cert_achive
 * @property int $status
 * @property string|null $register_at
 * @property int $register_status
 *
 * @property Category $category
 * @property Horse $horse
 * @property Rider $rider
 */
class Competition extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'competition';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kejohanan_id', 'category_id'], 'required'],
            [['kejohanan_id', 'category_id', 'rider_id', 'horse_id', 'cert_achive', 'status', 'register_status'], 'integer'],
            [['hadlaju', 'jarak'], 'number'],
            [['register_at'], 'safe'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['rider_id'], 'exist', 'skipOnError' => true, 'targetClass' => Rider::className(), 'targetAttribute' => ['rider_id' => 'id']],
            [['horse_id'], 'exist', 'skipOnError' => true, 'targetClass' => Horse::className(), 'targetAttribute' => ['horse_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kejohanan_id' => 'Kejohanan ID',
            'category_id' => 'Category ID',
            'rider_id' => 'Rider ID',
            'horse_id' => 'Horse ID',
            'hadlaju' => 'Hadlaju',
            'jarak' => 'Jarak',
            'cert_achive' => 'Cert Achive',
            'status' => 'Status',
            'register_at' => 'Register At',
            'register_status' => 'Register Status',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * Gets query for [[Horse]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHorse()
    {
        return $this->hasOne(Horse::className(), ['id' => 'horse_id']);
    }

    /**
     * Gets query for [[Rider]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRider()
    {
        return $this->hasOne(Rider::className(), ['id' => 'rider_id']);
    }
}
