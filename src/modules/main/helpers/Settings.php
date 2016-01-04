<?php

namespace app\modules\main\helpers;

/**
 * @link http://www.diemeisterei.de/
 * @copyright Copyright (c) 2016 diemeisterei GmbH, Stuttgart
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
class Settings
{
    static function get($key, $section, $default = null, $create = true) {
        $value = \Yii::$app->settings->get($key, $section, $default);
        if ($value === $default && $create !== false) {
            \Yii::$app->settings->set($key, $default, $section);
            \Yii::$app->settings->deactivate($key, $section);
        }
        return $value;
    }
}