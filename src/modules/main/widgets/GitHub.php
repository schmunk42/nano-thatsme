<?php
/**
 * @link http://www.diemeisterei.de/
 * @copyright Copyright (c) 2016 diemeisterei GmbH, Stuttgart
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace app\modules\main\widgets;


use Github\Client;
use yii\base\Widget;
use yii\helpers\VarDumper;

class GitHub extends Widget
{
    public $client;

    public function init()
    {
        $this->client = new Client();
    }

    public function run()
    {
        $user = $this->client->api('user')->show('schmunk42');
        return $this->render('git-hub', ['data' => $user]);
    }
}