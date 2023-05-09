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
            [['category_name'], 'required'],
            [['is_enabled'], 'integer'],
            [['category_name'], 'string', 'max' => 255],
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

    /**
     * Gets query for [[Competitions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompetitions()
    {
        return $this->hasMany(Competition::className(), ['category_id' => 'id']);
    }

    public static function getCategoryList(){
        return ArrayHelper::map(self::find()->where(['is_enabled' => 1])->all(), 'id', 'category_name');
    }
}
