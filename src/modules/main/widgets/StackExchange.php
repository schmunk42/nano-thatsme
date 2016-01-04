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
use BenatEspina\StackExchangeApiClient\Client;
use BenatEspina\StackExchangeApiClient\Method\UserAPI;
use yii\base\Widget;
use yii\helpers\VarDumper;

class StackExchange extends Widget
{
    const SETTINGS_SECTION = 'widgets.StackExchange';
    public $client;

    public function init()
    {
        $this->client = new Client();
    }

    public function run()
    {
        return $this->render('stack-exchange', ['data' => $this->getUser()]);
    }

    private function getUser()
    {
        // TODO: use guzzle cache
        $userId = Settings::get('userId', self::SETTINGS_SECTION);
        if ($userId) {
            $data = \Yii::$app->cache->get(__METHOD__.$userId);
            if ($data) {
                return $data;
            } else {
                $api = new UserAPI($this->client);
                $data = $api->getByIds([$userId])[0];
                \Yii::trace($data, __METHOD__);
                \Yii::$app->cache->set(__METHOD__, $data, 3600);
                return $data;
            }
        } else {
            \Yii::$app->session->addFlash('warning', 'StackOverflow userId not set.');
        }
    }

}