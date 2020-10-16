<?php
namespace inquid\vue;

use yii\web\AssetBundle;

/**
 * Description of VueAsset
 *
 * @author akbar joudi <akbar.joody@gmail.com>
 */
class VueRouterAsset extends AssetBundle
{
    public $baseUrl = 'https://unpkg.com/vue-router/dist/';

    public $js = [];

    public function init()
    {
        $this->js[] = YII_ENV_DEV ? 'vue-router.js' : 'vue-router.min.js';
    }
}
