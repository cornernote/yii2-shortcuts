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
        return Yii::$app;
    }

    /**
     * @return mixed|\yii\web\User
     */
    static public function user()
    {
        return Yii::$app->getUser();
    }

    /**
     * @return \yii\db\Connection
     */
    static public function db()
    {
        return Yii::$app->getDb();
    }

    /**
     * @return \yii\caching\Cache
     */
    static public function cache()
    {
        return Yii::$app->getCache();
    }

    /**
     * @return \yii\console\Request|\yii\web\Request
     */
    static public function request()
    {
        return Yii::$app->getRequest();
    }

    /**
     * @param $param
     * @return bool
     */
    static public function param($param)
    {
        return isset(Yii::$app->params[$param]) ? Yii::$app->params[$param] : false;
    }
    
}


