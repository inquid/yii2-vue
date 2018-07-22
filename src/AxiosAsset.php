<?php
namespace inquid\vue;

/**
 * Description of VueAsset
 *
 * @author akbar joudi <akbar.joody@gmail.com>
 */
class AxiosAsset extends \yii\web\AssetBundle{
    public $sourcePath = '@bower/axios/dist';
    
    public $js = [
        'axios.min.js',
    ];
}
