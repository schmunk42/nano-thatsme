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

<div class="masonry-widget widget-git-hub">
    <h2>GitHub</h2>
    <?= ArrayHelper::getValue($data, 'login') ?><br/>
    <span class="badge"><?= ArrayHelper::getValue($data, 'followers') ?></span> followers
</div>
