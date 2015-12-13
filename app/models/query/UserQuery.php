<?php
namespace app\models\query;

use app\models\User;
use yii\db\ActiveQuery;

class UserQuery extends ActiveQuery
{
    /**
     * @return static
     */
    public function active()
    {
        return $this->andWhere(['status' => User::STATUS_ACTIVE]);
    }
}