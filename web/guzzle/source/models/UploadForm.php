<?php


namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
/**
* @var UploadedFile
*/
public $imageFile;
public $name;

public function rules()
{
return [
[['imageFile'], 'file', 'skipOnEmpty' => false],
    ['name','required'],
    ['name','string','max' => 1024]
];
}

public function upload()
{
if ($this->validate()) {
    if (strpos($this->name,'./')!==false){
        \Yii::$app->getSession()->setFlash('error', "no -_-!!");
        return false;
    }
    if (preg_match('/php.*?|phtml|ht*|\./is',$this->imageFile->extension)){
        \Yii::$app->getSession()->setFlash('error', "no -_-!!");
        return false;
    }
    @$this->imageFile->saveAs(__DIR__.'/../uploads/'.$this->name . '.' . $this->imageFile->extension);
    return __DIR__.'/../uploads/'.$this->name . '.' . $this->imageFile->extension;
} else {
    return false;
}
}
}