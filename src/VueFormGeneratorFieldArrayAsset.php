<?php
namespace inquid\vue;

/**
 * Description of VueAsset
 *
 * @author Luis Gonzalez <contact@inquid.co>
 */
class VueFormGeneratorFieldArrayAsset extends \yii\web\AssetBundle
{
    public $baseUrl = 'https://cdn.jsdelivr.net/npm/vfg-field-array@0.0.6/dist/';
    
    public $js = [
        'vfg-field-array.min.js',
    ];
}
