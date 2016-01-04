<?php
/**
 * @link http://www.diemeisterei.de/
 * @copyright Copyright (c) 2016 diemeisterei GmbH, Stuttgart
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace app\modules\main\widgets;

use app\modules\main\helpers\Settings;
use Github\Client;
use Github\Exception\RuntimeException;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\VarDumper;

class GitHub extends Widget
{
    const SETTINGS_SECTION = 'widgets.GitHub';

    public $client;

    public function init()
    {
        $this->client = new Client();
    }

    public function run()
    {
        $userName = Settings::get('userName', self::SETTINGS_SECTION);
        if ($userName) {
            try {
                $user = \Yii::$container->get('github')->api('user')->show($userName);
                \Yii::trace($user, __METHOD__);
                return $this->render('git-hub', ['data' => $user]);
            } catch (RuntimeException $e) {
                \Yii::$app->session->addFlash('error', 'GitHub API error: '.$e->getMessage());
            }
        } else {
            $settingsLink = Html::a('settings module', ['/settings']);
            \Yii::$app->session->addFlash('warning', "GitHub <code>userName</code> not set, go to {$settingsLink}.");
        }
    }
}