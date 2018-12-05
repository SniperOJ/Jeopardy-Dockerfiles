<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $filepath
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['username', 'password', 'filepath'], 'string', 'max' => 1024],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'filepath' => 'Filepath',
        ];
    }

    public function validate1($attributeNames = NULL, $clearErrors = true){
        $res = Users::find()->where(['username'=>$this->username])->one();
        if(!$res){ return False; }
        if ($res->password == $this->password) {
            $this->id = $res->id;
            return True;
        }else{
            return False;
        }
    }

    public function login()
    {
        if ($this->validate1()) {
            return True;
        }
        return false;
    }

}
