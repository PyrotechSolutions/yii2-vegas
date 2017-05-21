<?php

namespace ptech\vegas;

use yii\web\AssetBundle;

/**
 * @author Reginald Goolsby <developers@pyrotechsolutions.com>
 * @link http://www.pyrotechsolutions.com/

 */

class VegasAsset extends AssetBundle
{
    public $sourcePath = '@bower/vegas/dist';

    public $css = [
        'vegas.min.css'
    ];

    public $js = [
        'vegas.min.js'
    ];

    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
