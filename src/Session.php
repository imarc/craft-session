<?php
namespace Imarc\Craft;

use Yii;
use yii\base\InvalidArgumentException;

/**
 * Session class.
 *
 * Learn more about Yii module development in Yii's documentation:
 * http://www.yiiframework.com/doc-2.0/guide-structure-modules.html
 */
class Session extends \craft\web\Session
{
    /**
     * setSavePath() with support for using an octal mask for session file permissions
     *
     * Example: setSavePath('0;0660;@storage/session')
     *
     * @param $value string
     */
    public function setSavePath($value)
    {
        $values = explode(';', $value);
        $value = array_pop($values);
        $path = Yii::getAlias($value);

        if (is_dir($path)) {
            array_push($values, $path);
            session_save_path(implode(';', $values));
        } else {
            throw new InvalidArgumentException("Session save path is not a valid directory: $value");
        }
    }
}
