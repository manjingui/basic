<?php

namespace app\models;

use yii\db\Query;

class User extends \yii\base\BaseObject implements \yii\web\IdentityInterface
{
    public $id;
    public $username;
//    public $password;
    public $authKey;
    public $accessToken;





    private static $users = [
//        '100' => [
//            'id' => '100',
//            'username' => 'admin',
//            'password' => 'admin',
//            'authKey' => 'test100key',
//            'accessToken' => '100-token',
//        ],
//        '101' => [
//            'id' => '101',
//            'username' => 'demo',
//            'password' => 'demo',
//            'authKey' => 'test101key',
//            'accessToken' => '101-token',
//        ],
    ];




    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        $userInfo  = (new Query()) -> from('user')->where(['=','id',$id])->one();
        //var_dump($userInfo);
        if(!empty($userInfo)){
            return new static($userInfo);
        }
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }


    public static function findByUsername($username)
    {
        $userInfo  = (new Query()) -> from('user')->where(['=','username',$username])->one();
        //var_dump($userInfo);
        if(!empty($userInfo)){
           return new static($userInfo);
        }
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

}
