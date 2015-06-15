<?php

namespace cornernote\shortcuts;

use Yii;

/**
 * Class Y
 * @package cornernote\shortcuts
 */
class Y
{
    /**
     * @return \yii\console\Application|\yii\web\Application
     */
    static public function app()
    {
        return \Yii::$app;
    }

    /**
     * @return mixed|\yii\web\User
     */
    static public function user()
    {
        return \Yii::$app->user;
    }

}
