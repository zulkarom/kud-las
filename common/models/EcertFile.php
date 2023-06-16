<?php
namespace common\models;

use Yii;
use yii\helpers\Url;
use limion\jqueryfileupload\JQueryFileUpload;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;
use yii\helpers\Json;
use yii\db\Expression;

class EcertFile
{
   
	public static function download($model, $attr, $filename){
		
        $file = Yii::getAlias('@ecertdir/' . $model->{$attr});
		
        if (file_exists($file)) {
		$ext = pathinfo($model->{$attr}, PATHINFO_EXTENSION);

		$filename = $filename . '.' . $ext ;
		
		self::sendFile($file, $filename, $ext);
		
		}
		
		
	}
	
	public static function sendFile($file, $filename, $ext){
		header("Cache-Control: public");
		header("Content-Description: File Transfer");
		header("Content-Disposition: inline; filename=" . $filename);
		header("Content-Type: " . self::mimeType($ext));
		header("Content-Length: " . filesize($file));
		header("Content-Transfer-Encoding: binary");
		readfile($file);
		exit;
	}
	
	public static function mimeType($ext){
		switch($ext){
			case 'pdf':
			$mime = 'application/pdf';
			break;
			
			case 'jpg':
			case 'jpeg':
			$mime = 'image/jpeg';
			break;
			
			case 'gif':
			$mime = 'image/gif';
			break;
			
			case 'png':
			$mime = 'image/png';
			break;
			
			default:
			$mime = '';
			break;
		}
		
		return $mime;
	}
	
}
