<div class="main-default-index">
    <div class="container">

        <h1>That's me</h1>

        <?php \yii2masonry\yii2masonry::begin(
            [
                'clientOptions' => [
                    'columnWidth' => 20,
                    'masonry-itemSelector' => '.masonry-item'
                ]
            ]
        ); ?>

        <?= \app\modules\main\widgets\StackExchange::widget() ?>
        <?= \app\modules\main\widgets\GitHub::widget() ?>

        <?php \yii2masonry\yii2masonry::end(); ?>

    </div>

</div>
