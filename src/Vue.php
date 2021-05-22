<?php

namespace inquid\vue;

use inquid\vue\classes\Mounted;
use inquid\vue\plugins\BasePluginProvider;
use Yii;
use yii\base\InvalidConfigException;
use yii\base\Widget;
use yii\composer\Plugin;
use yii\web\JsExpression;
use yii\web\View;

Yii::setAlias('@vueroot', dirname(__FILE__));

/**
 * @author akbar joudi <akbar.joody@gmail.com>
 * @author INQUID LLC <contact@inquid.co>
 */
class Vue extends Widget
{
    /**
     * @var string
     */
    public $jsName = 'app';


    /** @var bool If enabled: generated js app will be saved on local disk, it'll also be saved in logs */
    public $debugMode;

    /**
     * @see VueRouter
     */
    public $vueRouter;

    /**
     *
     * @var array
     */
    public $data;

    /**
     *   template
     */
    public $template;

    /**
     * 'methods' => [
     *  'reverseMessage' => new yii\web\JsExpression("function(){"
     *      . "this.message =1; "
     *      . "}"),
     *  ]
     * @var array
     */
    public $methods;

    /**
     * 'components' => [
     *      ['name' => 'component'],
     *  ]
     * @var array
     */
    public $components;

    /**
     * 'filters' => [
     *  'reverseMessage' => new yii\web\JsExpression("function(){"
     *      . "this.message =1; "
     *      . "}"),
     *  ]
     * @var array
     */
    public $filters;

    /**
     *
     * @var array
     */
    public $watch;

    /**
     *
     * @var array
     */
    public $computed;

    /**
     *
     * @var JsExpression
     */
    public $beforeCreate;

    /**
     *
     * @var JsExpression
     */
    public $created;

    /**
     *
     * @var JsExpression
     */
    public $beforeMount;

    /**
     *
     * @var JsExpression
     */
    public $mounted;

    /**
     *
     * @var JsExpression
     */
    public $beforeUpdate;

    /**
     *
     * @var JsExpression
     */
    public $updated;

    /**
     *
     * @var JsExpression
     */
    public $activated;

    /**
     *
     * @var JsExpression
     */
    public $deactivated;

    /**
     *
     * @var JsExpression
     */
    public $beforeDestroy;

    /**
     *
     * @var JsExpression
     */
    public $destroyed;

    /** @var Plugin[] $plugins */
    public $plugins;


    /**
     * {@inheritdoc}
     * @throws InvalidConfigException
     */
    public function init()
    {
        $this->view->registerAssetBundle(VueAsset::class);
        $this->view->registerAssetBundle(AxiosAsset::class);
        $this->view->registerAssetBundle(VueFormGeneratorAsset::class);
        $this->view->registerAssetBundle(VueFormGeneratorFieldArrayAsset::class);
        $this->view->registerAssetBundle(VueBootstrapAsset::class);
        if($this->vueRouter)
        {
            $this->view->registerAssetBundle(VueRouterAsset::class);
        }

        $this->debugMode = YII_DEBUG ?? false;
    }

    public static function begin($config = [], BasePluginProvider $pluginProvider = null)
    {
        if ($pluginProvider === null) {
            $pluginProvider = new BasePluginProvider();
        }

        $config = $pluginProvider->loadPlugins($config);
        if (isset($config['mounted'])) {
            $config['mounted'] = (new Mounted())->formatJsExpression([$config['mounted']]);
        }
        $obj = parent::begin($config);
        echo '<div id="' . $obj->id . '">';

        return $obj;
    }


    public static function end()
    {
        echo '</div>';
        return parent::end();
    }

    public function run()
    {
        $this->renderVueJs();
    }

    public function renderVueJs()
    {
        $data = $this->generateData();
        $methods = $this->generateMethods();
        $filters = $this->generateFilters();
        $components = $this->generateComponents();
        $watch = $this->generateWatch();
        $computed = $this->generateComputed();
        $el = $this->id;
        $js = "
            Vue.use(BootstrapVue);
            ".(($this->vueRouter) ? $this->vueRouter:null)."
            var {$this->jsName} = new Vue({
                el: '#" . $el . "',
                " . (($this->vueRouter) ? "router," : null) . "
                " . (!empty($this->template) ? "template :'" . $this->template . "'," : null) . "
                " . (!empty($components) ? "components :" . $components . "," : null) . "
                " . (!empty($data) ? "data :" . $data . "," : null) . "
                " . (!empty($methods) ? "methods :" . $methods . "," : null) . "
                " . (!empty($filters) ? "filters :" . $filters . "," : null) . "
                " . (!empty($watch) ? "watch :" . $watch . "," : null) . "
                " . (!empty($computed) ? "computed :" . $computed . "," : null) . "
                " . (!empty($this->beforeCreate) ? "beforeCreate :" . $this->beforeCreate->expression . "," : null) . "
                " . (!empty($this->created) ? "created :" . $this->created->expression . "," : null) . "
                " . (!empty($this->beforeMount) ? "beforeMount :" . $this->beforeMount->expression . "," : null) . "
                " . (!empty($this->mounted) ? "mounted :" . $this->mounted->expression . "," : null) . "
                " . (!empty($this->beforeUpdate) ? "beforeUpdate :" . $this->beforeUpdate->expression . "," : null) . "
                " . (!empty($this->updated) ? "updated :" . $this->updated->expression . "," : null) . "
                " . (!empty($this->beforeDestroy) ? "beforeDestroy :" . $this->beforeDestroy->expression . "," : null) . "
                " . (!empty($this->destroyed) ? "destroyed :" . $this->destroyed->expression . "," : null) . "
                " . (!empty($this->activated) ? "activated :" . $this->activated->expression . "," : null) . "
                " . (!empty($this->deactivated) ? "deactivated :" . $this->deactivated->expression . "," : null) . "
                components: {
                    'vue-form-generator': VueFormGenerator.component,
                    'field-array': VueFormGenerator.FieldArray
                },
            }); 
        ";
        !$this->debugMode ?: $this->saveDebugData($js);
        Yii::$app->view->registerJs($js, View::POS_END);
    }

    /**
     * Method to save the generated app into a file and log.
     *
     * @var $js string javascript generated application
     */
    public function saveDebugData(string $js): void
    {
        Yii::debug($js, 'debug');
    }

    /**
     * @return false|string
     */
    public function generateData()
    {
        if (!empty($this->data)) {
            return json_encode($this->data);
        }

        return '';
    }

    public function generateMethods(): string
    {
        if (is_array($this->methods) && !empty($this->methods)) {
            $str = '';
            foreach ($this->methods as $key => $value) {
                if ($value instanceof JsExpression) {
                    $str .= $key . ":" . $value->expression . (substr($value->expression, 1) == ',' ?: '');
                }
            }
            $str = rtrim($str,',');

            return "{" . $str . "}";
        }

        return '';
    }

    /**
     * @return string
     */
    public function generateFilters(): string
    {
        if (is_array($this->filters) && !empty($this->filters)) {
            $str = '';
            foreach ($this->filters as $key => $value) {
                if ($value instanceof JsExpression) {
                    $str .= $key . ":" . $value->expression . (substr($value->expression, 1) == ',' ?: '');
                }
            }
            $str = rtrim($str,',');

            return "{" . $str . "}";
        }

        return '';
    }

    /**
     * Get the components to include in the app.
     *
     * @return string
     */
    public function generateComponents(): string
    {
        if(!empty($this->components))
        {
            $components='';
            for ($i=0; $i < count($this->components); $i++) {
                $component =  new VueComponent($this->components[$i]);
                $components .= $component.',';
            }
            return substr($components, 0, strlen($components)-1);
        }

        return '';
    }

    /**
     * @return string
     */
    public function generateWatch(): string
    {
        if (is_array($this->watch) && !empty($this->watch)) {
            $str = '';
            foreach ($this->watch as $key => $value) {
                if ($value instanceof JsExpression) {
                    $str .= $key . ":" . $value->expression . (substr($value->expression, 1) == ',' ?: '');
                }
            }
            $str = rtrim($str,',');

            return "{" . $str . "}";
        }

        return '';
    }

    /**
     * @return string
     */
    public function generateComputed(): string
    {
        if (is_array($this->computed) && !empty($this->computed)) {
            $str = '';
            foreach ($this->computed as $key => $value) {
                if ($value instanceof JsExpression) {
                    $str .= $key . ":" . $value->expression . (substr($value->expression, 1) == ',' ?: '');
                }
            }
            $str = rtrim($str,',');

            return "{" . $str . "}";
        }

        return '';
    }

    /**
     * @param $tagName
     * @param $option
     */
    public function component($tagName, $option) {
        $option = json_encode($option);
        $this->view->registerJs("
            Vue.component($tagName, $option);
            ");
    }
}
