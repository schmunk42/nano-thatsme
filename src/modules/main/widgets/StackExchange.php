<?php
/**
 * @link http://www.diemeisterei.de/
 * @copyright Copyright (c) 2016 diemeisterei GmbH, Stuttgart
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace app\modules\main\widgets;


use BenatEspina\StackExchangeApiClient\Client;
use BenatEspina\StackExchangeApiClient\Method\UserAPI;
use yii\base\Widget;
use yii\helpers\VarDumper;

class StackExchange extends Widget
{
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
        $api = new UserAPI($this->client);
        return $api->getByIds([291573])[0];
    }

}