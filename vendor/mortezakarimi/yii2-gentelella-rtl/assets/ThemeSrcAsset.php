<?php
/**
* @copyright Copyright (c) 2015 Yiister
* @license https://github.com/yiister/yii2-gentelella/blob/master/LICENSE
* @link http://gentelella.yiister.ru
*/

namespace mortezakarimi\gentelellartl\assets;

use yii\web\AssetBundle;

class ThemeSrcAsset extends AssetBundle
{
    public $sourcePath = '@bower/gentelella-rtl/build/js';

    public $js = [
        'helpers/smartresize.js',
        'custom.js',
    ];
}
