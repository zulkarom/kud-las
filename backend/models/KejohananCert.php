<?php

namespace backend\models;

use Yii;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

/**
 * This is the model class for table "kejohanan_cert".
 *
 * @property int $id
 * @property int $category_id
 * @property int|null $certificate_file
 * @property int $kejohanan_id
 *
 * @property Category $category
 * @property Kejohanan $kejohanan
 */
class KejohananCert extends \yii\db\ActiveRecord
{
    public $cert_instance;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kejohanan_cert';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'kejohanan_id'], 'required'],
            [['category_id', 'kejohanan_id'], 'integer'],
            [['certificate_file'], 'string'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
            [['kejohanan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Kejohanan::class, 'targetAttribute' => ['kejohanan_id' => 'id']],

            [['category_id', 'kejohanan_id'], 'unique', 'targetAttribute' => ['category_id', 'kejohanan_id']],

            [['cert_instance'], 'file',
            'maxSize' => 1024 * 1024 * 3, // 3MB
            'extensions' => 'gif, jpg, png', 
            'mimeTypes' => 'image/gif, image/jpeg, image/png',
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'certificate_file' => 'Certificate File',
            'kejohanan_id' => 'Kejohanan ID',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    /**
     * Gets query for [[Kejohanan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKejohanan()
    {
        return $this->hasOne(Kejohanan::class, ['id' => 'kejohanan_id']);
    }

    public function uploadFile(){
        $inst_property = 'cert_instance';
        $attr_db = 'certificate_file';
        $name = 'file';
        
        $instance = UploadedFile::getInstance($this, $inst_property);
        if($instance){
            if($this->isNewRecord){
                //$path = time();
                $path =  $this->kejohanan_id . '/' . $this->category_id;
            }else{
                //delete existing file
                $old_path = Yii::getAlias('@ecertdir/' . $this->$attr_db);
                if (is_file($old_path)) {
                    unlink($old_path);
                }
                $path =  $this->kejohanan_id . '/' . $this->category_id;
            }
            
            
            $directory = Yii::getAlias('@ecertdir/' . $path. '/');
            if (!is_dir($directory)) {
                FileHelper::createDirectory($directory);
            }

            $ext = $instance->extension;
            $fileName = $name.'.' . $ext;
            $filePath = $directory . $fileName;
                if ($instance->saveAs($filePath)) {
                    //assigning value here
                    $this->$attr_db =  $path . '/' . $fileName;
                }
        }

    }

    public function countAchieveByCategory($achieve = 1){
        $kira = Participant::find()
        ->where([
            'category_id' => $this->category_id, 
            'cert_achive' => $achieve, 
            'kejohanan_id' => $this->kejohanan_id,
            'register_status' => 100
        ])
        ->count();
        return $kira ? $kira : 0;
    }

}
