<?php
namespace inquid\vue;

/**
 * Description of VueAsset
 *
 * @author akbar joudi <akbar.joody@gmail.com>
 */
class AxiosAsset extends \yii\web\AssetBundle
{
    public $baseUrl = 'https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/';
    
    public $js = [
        'axios.min.js',
    ];
}
