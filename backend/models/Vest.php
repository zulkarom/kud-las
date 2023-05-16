<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "vest".
 *
 * @property int $id
 * @property int $vest_no
 * @property string $color
 * @property int $status
 * @property int|null $competition_id
 */
class Vest extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vest';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['vest_no', 'color'], 'required'],
            [['vest_no', 'status', 'competition_id'], 'integer'],
            [['color'], 'string', 'max' => 100],
            [['competition_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'vest_no' => 'Vest No',
            'color' => 'Color',
            'status' => 'Status',
            'competition_id' => 'Rider',
        ];
    }
}
