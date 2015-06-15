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
     * @param $name
     * @return null|\yii\base\Module
     */
    static public function module($name)
    {
        return Yii::$app->getModule($name);
    }

    /**
     * @param $name
     * @return null|object
     */
    static public function component($name)
    {
        return Yii::$app->get($name);
    }

    /**
     * @return \yii\i18n\Formatter
     */
    static public function formatter()
    {
        return Yii::$app->formatter;
    }

    /**
     * @return \yii\console\Controller|\yii\web\Controller
     */
    static public function controller()
    {
        return Yii::$app->controller;
    }

    /**
     * @return \yii\base\View|\yii\web\View
     */
    static public function view()
    {
        return Yii::$app->getView();
    }

    /**
     * @return \yii\web\Session
     */
    static public function session()
    {
        return Yii::$app->getSession();
    }

    /**
     * Returns the Yii::$app->params variable value or $defaultValue if the Yii::$app->params variable does not exist
     *
     * @param string $name the param variable name (could be used dot delimiter for nested variable)
     * Example: variable name 'Post.post_text' will return value at Yii::$app->params['Post']['post_text']
     * @param mixed $defaultValue the default value to be returned when the Yii::$app->params variable does not exist
     * @return mixed
     */
    static public function param($name, $defaultValue = null)
    {
        return self::getValueByComplexKeyFromArray($name, Yii::$app->params, $defaultValue);
    }

    /**
     * Returns the $_GET variable value or $defaultValue if the $_GET variable does not exist
     *
     * @param string $name the $_GET variable name (could be used dot delimiter for nested variable)
     * Example: variable name 'Post.post_text' will return value at $_GET['Post']['post_text']
     * @param mixed $defaultValue the default value to be returned when the $_GET variable does not exist
     * @return mixed
     */
    public static function GET($name, $defaultValue = null)
    {
        return self::getValueByComplexKeyFromArray($name, $_GET, $defaultValue);
    }

    /**
     * Returns the $_POST variable value or $defaultValue if the $_POST variable does not exist
     *
     * @param string $name the $_POST variable name (could be used dot delimiter for nested variable)
     * Example: variable name 'Post.post_text' will return value at $_POST['Post']['post_text']
     * @param mixed $defaultValue the default value to be returned when the $_POST variable does not exist
     * @return mixed
     */
    public static function POST($name, $defaultValue = null)
    {
        return self::getValueByComplexKeyFromArray($name, $_POST, $defaultValue);
    }

    /**
     * Returns the $_FILES variable value or $defaultValue if the $_FILES variable does not exist
     *
     * @param string $name the $_FILES variable name (could be used dot delimiter for nested variable)
     * Example: variable name 'userfile.name' will return value at $_FILES['userfile']['name']
     * @param mixed $defaultValue the default value to be returned when the $_FILES variable does not exist
     * @return mixed
     */
    public static function FILES($name, $defaultValue = null)
    {
        return self::getValueByComplexKeyFromArray($name, $_FILES, $defaultValue);
    }

    /**
     * Returns the relative URL for the application
     *
     * @param bool $absolute whether to return an absolute URL. Defaults to false, meaning returning a relative one (@since 1.1.0)
     * @return string
     */
    public static function baseUrl($absolute = false)
    {
        return Yii::$app->request->getBaseUrl($absolute);
    }

    /**
     * Returns the array variable value or $defaultValue if the array variable does not exist
     *
     * @param string $key the array variable name (could be used dot delimiter for nested variable)
     * Example: variable name 'Media.Foto.thumbsize' will return value at $array['Media']['Foto']['thumbsize']
     * @param array $array an array containing variable to return
     * @param mixed $defaultValue the default value to be returned when the array variable does not exist
     * @return mixed
     */
    public static function getValueByComplexKeyFromArray($key, $array, $defaultValue = null)
    {
        if (strpos($key, '.') === false) {
            return (isset($array[$key])) ? $array[$key] : $defaultValue;
        }
        $keys = explode('.', $key);
        $firstKey = array_shift($keys);
        if (!isset($array[$firstKey])) {
            return $defaultValue;
        }
        $value = $array[$firstKey];
        foreach ($keys as $k) {
            if (!isset($value[$k]) && !array_key_exists($k, $value)) {
                return $defaultValue;
            }
            $value = $value[$k];
        }
        return $value;
    }
}


