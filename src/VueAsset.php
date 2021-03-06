<?php
namespace inquid\vue;

/**
 * Description of VueAsset
 *
 * @author akbar joudi <akbar.joody@gmail.com>
 */
class VueAsset extends \yii\web\AssetBundle
{
    public $baseUrl = 'https://cdn.jsdelivr.net/npm/vue/dist/';
    
    public $js = [];
    
    public function init()
    {
        $this->js[] = YII_ENV == "dev" ? 'vue.js' : 'vue.min.js';
    }
}
