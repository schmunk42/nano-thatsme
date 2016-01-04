<?php
/**
 * @link http://www.diemeisterei.de/
 *
 * @copyright Copyright (c) 2016 diemeisterei GmbH, Stuttgart
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

#Yii::$container->set('\yii\helpers\VarDumper', );

return [
    /*'components' => [
        'assetManager' => [
            // Note: For using mounted volumes or shared folders
            'dirMode' => YII_ENV_PROD ? 0777 : null,
            'bundles' => getenv('APP_ASSET_USE_BUNDLED') ?
                 require(__DIR__.'/assets-gen/prod.php') :
                [
                    // Note: if your asset bundle includes bootstrap, you can disable the default asset
                    #'yii\bootstrap\BootstrapAsset' => false,
                ],
            'basePath' => '@app/../web/assets',
        ],
    ],*/
    'modules' => [
        'main' => [
            'class' => 'app\modules\main\Module',
        ],
    ],
];
