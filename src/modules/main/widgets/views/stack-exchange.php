<?php
namespace app\modules\main\widgets\views;

/**
 * @link http://www.diemeisterei.de/
 * @copyright Copyright (c) 2016 diemeisterei GmbH, Stuttgart
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use yii\helpers\ArrayHelper;

?>

<div class="masonry-widget widget-stack-overflow">
    <h2>Stack Overflow</h2>
    <?= ArrayHelper::getValue($data, 'display_name') ?><br/>
    <span class="badge"><?= ArrayHelper::getValue($data, 'reputation') ?></span> reputation
</div>
