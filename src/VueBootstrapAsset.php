<?php
namespace inquid\vue;

use \yii\web\AssetBundle;

/**
 * VueBootstrap Asset 
 *
 * @author Industial Quality Ideas LLC <contact@inquid.co>
 */
class VueBootstrapAsset extends AssetBundle
{
    public $baseUrl = 'https://unpkg.com/bootstrap-vue@latest/dist/';

    public $css = [
        'https://unpkg.com/bootstrap-vue@2.0.0-rc.11/dist/bootstrap-vue.css',
    ];

    public $js = [
        'bootstrap-vue.min.js',
    ];
}
