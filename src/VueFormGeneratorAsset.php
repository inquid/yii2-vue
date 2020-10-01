<?php
namespace inquid\vue;

/**
 * Description of VueAsset
 *
 * @author Luis Gonzalez <contact@inquid.co>
 */
class VueFormGeneratorAsset extends \yii\web\AssetBundle
{
    public $baseUrl = 'https://unpkg.com/vue-form-generator/dist/';
    
    public $js = [
        'vfg.js',
    ];
}
