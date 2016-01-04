<?php
/**
 * @link http://www.diemeisterei.de/
 *
 * @copyright Copyright (c) 2016 diemeisterei GmbH, Stuttgart
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

Yii::$container->set(
    'github',
    function () {
        return new \Github\Client(
            new \Github\HttpClient\CachedHttpClient(array('cache_dir' => '/app/runtime/github-api-cache'))
        );
    }
);

return [
    'defaultRoute' => 'main',
    'modules' => [
        'main' => [
            'class' => 'app\modules\main\Module',
        ],
    ],
];
