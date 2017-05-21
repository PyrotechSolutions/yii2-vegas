<?php
/**
 * @link https://github.com/PyrotechSolutions/yii2-vegas
 * @license https://opensource.org/licenses/MIT
 */
namespace ptech\vegas;

use yii\base\InvalidConfigException;
use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\JsExpression;

/**
 *
 * @author Reginald Goolsby <developers@pyrotechsolutions.com>
 * @link http://www.pyrotechsolutions.com/
 */
class Vegas extends Widget
{
    /**
     * @var string the DOM element the Widget is applied to.
     */
    public $target = 'body';

    public $slides = [];
    /**
     * @var array the HTML attributes for the widget container tag.
     */
    public $options = [];

    /**
     * @var array the options for the underlying Vegas JS plugin.
     * Please refer to the corresponding Vegas type plugin Web page for possible options.
     * For example, [this page](http://vegas.jaysalvat.com/documentation/setup/) shows
     * how to use the Vegas plugin.
     */
    public $clientOptions = [];


    /**
     * Initializes the widget.
     * This method will register the bootstrap asset bundle. If you override this method,
     * make sure you call the parent implementation first.
     */
    public function init()
    {
        parent::init();
        if (empty($this->target)) {
            throw new InvalidConfigException("The 'target' variable is required");
        }
    }

    /**
     * Renders the widget.
     */
    public function run()
    {
        $this->registerClientScript();
    }

    /**
     * Registers the required js files and script to initialize ChartJS plugin
     */
    protected function registerClientScript()
    {
        $view = $this->getView();
        VegasAsset::register($view);
        $config = Json::encode($this->clientOptions);
        $js = "jQuery('{$this->domTarget}').vegas($config)";
        $view->registerJs($js);
    }

    protected function getDomTarget(){
        return ($this->target === 'body') ? $this->target : '#'.$this->target;
    }
}
