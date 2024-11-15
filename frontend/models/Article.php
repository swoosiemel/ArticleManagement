<?php

namespace common\models;
namespace app\models;

use Yii;
use yii\base\Model;
use common\models\User;

use yii\db\ActiveRecord;

class Article extends ActiveRecord
{
    public static function tableName()
    {
        return 'article';
    }

    public function rules()
    {
        return [
            [['title', 'content'], 'required'],
            ['slug', 'string'],
            ['slug', 'unique'],
            ['content', 'string'],
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
