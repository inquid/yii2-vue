<?php

namespace inquid\vue;

use inquid\vue\plugins\BasePluginProvider;
use Yii;

/**
 * @author akbar joudi <akbar.joody@gmail.com>
 */
class Vue extends \yii\base\Widget
{
    public $jsName = 'app';
    /**
     *
     * @var Array
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
     * @var Array
     */
    public $methods;

    /**
     * 'components' => [
     *      ['name' => 'component'],
     *  ]
     * @var Array
     */
    public $components;

    /**
     * 'filters' => [
     *  'reverseMessage' => new yii\web\JsExpression("function(){"
     *      . "this.message =1; "
     *      . "}"),
     *  ]
     * @var Array
     */
    public $filters;

    /**
     *
     * @var Array
     */
    public $watch;

    /**
     *
     * @var Array
     */
    public $computed;

    /**
     *
     * @var \yii\web\JsExpression
     */
    public $beforeCreate;

    /**
     *
     * @var \yii\web\JsExpression
     */
    public $created;

    /**
     *
     * @var \yii\web\JsExpression
     */
    public $beforeMount;

    /**
     *
     * @var \yii\web\JsExpression
     */
    public $mounted;

    /**
     *
     * @var \yii\web\JsExpression
     */
    public $beforeUpdate;

    /**
     *
     * @var \yii\web\JsExpression
     */
    public $updated;

    /**
     *
     * @var \yii\web\JsExpression
     */
    public $activated;

    /**
     *
     * @var \yii\web\JsExpression
     */
    public $deactivated;

    /**
     *
     * @var \yii\web\JsExpression
     */
    public $beforeDestroy;

    /**
     *
     * @var \yii\web\JsExpression
     */
    public $destroyed;

    /** @var Plugins[] $plugins */
    public $plugins;


    public function init()
    {
        $this->view->registerAssetBundle(VueAsset::className());
        $this->view->registerAssetBundle(AxiosAsset::className());
        $this->view->registerAssetBundle(VueFormGeneratorAsset::className());
    }

<<<<<<< HEAD
    public static function begin($config = array(), BasePluginProvider $pluginProvider = null)
    {
        if ($pluginProvider === null) {
            $pluginProvider = new BasePluginProvider();
        }

        $config = $pluginProvider->loadPlugins($config);
        $obj = parent::begin($config);
        echo '<div id="' . $obj->id . '">';

=======
    public static function begin($config = array()) {
        $obj =  parent::begin($config);
        echo '<div id="'.$obj->id.'">';
>>>>>>> 73784c89c3a1883b542ff2b90b7a145538057f54
        return $obj;
    }


<<<<<<< HEAD
    public static function end()
    {
=======
    public static function end() {
>>>>>>> 73784c89c3a1883b542ff2b90b7a145538057f54
        echo '</div>';
        return parent::end();
    }

<<<<<<< HEAD
    public function run()
    {
        return $this->renderVuejs();
    }

    public function renderVuejs()
    {
=======
    public function run() {
        return $this->renderVuejs();
    }

    public function renderVuejs() {
>>>>>>> 73784c89c3a1883b542ff2b90b7a145538057f54
        $data = $this->generateData();
        $methods = $this->generateMethods();
        $filters = $this->generateFilters();
        $components = $this->generateComponents();
        $watch = $this->generateWatch();
        $computed = $this->generateComputed();
        // TODO fix components
        $el = $this->id;
        $js = "
            var {$this->jsName} = new Vue({
<<<<<<< HEAD
                el: '#" . $el . "',
                " . (!empty($this->template) ? "template :'" . $this->template . "'," : null) . "
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
=======
                el: '#".$el."',
                ".(!empty($this->template) ? "template :'".$this->template."'," :null)."
                ".(!empty($data) ? "data :".$data.",":null)."
                ".(!empty($methods) ? "methods :".$methods."," :null)."
                ".(!empty($filters) ? "filters :".$filters."," :null)."
                ".(!empty($watch) ? "watch :".$watch."," :null)."
                ".(!empty($computed) ? "computed :".$computed."," :null)."
                ".(!empty($this->beforeCreate) ? "beforeCreate :".$this->beforeCreate->expression."," :null)."
                ".(!empty($this->created) ? "created :".$this->created->expression."," :null)."
                ".(!empty($this->beforeMount) ? "beforeMount :".$this->beforeMount->expression."," :null)."
                ".(!empty($this->mounted) ? "mounted :".$this->mounted->expression."," :null)."
                ".(!empty($this->beforeUpdate) ? "beforeUpdate :".$this->beforeUpdate->expression."," :null)."
                ".(!empty($this->updated) ? "updated :".$this->updated->expression."," :null)."
                ".(!empty($this->beforeDestroy) ? "beforeDestroy :".$this->beforeDestroy->expression."," :null)."
                ".(!empty($this->destroyed) ? "destroyed :".$this->destroyed->expression."," :null)."
                ".(!empty($this->activated) ? "activated :".$this->activated->expression."," :null)."
                ".(!empty($this->deactivated) ? "deactivated :".$this->deactivated->expression."," :null)."
>>>>>>> 73784c89c3a1883b542ff2b90b7a145538057f54
                components: {
                    \"vue-form-generator\": VueFormGenerator.component
                },
            }); 
        ";
        Yii::debug($js);
<<<<<<< HEAD
        Yii::debug('components ' . json_encode($this->generateComponents()));
        Yii::$app->view->registerJs($js, \yii\web\View::POS_END);
    }

    public function generateData()
    {
        if (!empty($this->data)) {
=======
        Yii::debug('components '.json_encode($this->generateComponents()));
        Yii::$app->view->registerJs($js, \yii\web\View::POS_END);
    }

    public function generateData() {
        if(!empty($this->data)){
>>>>>>> 73784c89c3a1883b542ff2b90b7a145538057f54
            return json_encode($this->data);
        }
    }

<<<<<<< HEAD
    public function generateMethods()
    {
        if (is_array($this->methods) && !empty($this->methods)) {
=======
    public function generateMethods() {
        if(is_array($this->methods) && !empty($this->methods)){
>>>>>>> 73784c89c3a1883b542ff2b90b7a145538057f54
            $str = '';
            foreach ($this->methods as $key => $value) {
                if ($value instanceof \yii\web\JsExpression) {
                    $str .= $key . ":" . $value->expression;
                }
            }
            return "{" . $str . "}";
        }
    }

    public function generateFilters()
    {
        if (is_array($this->filters) && !empty($this->filters)) {
            $str = '';
            foreach ($this->filters as $key => $value) {
                if ($value instanceof \yii\web\JsExpression) {
                    $str .= $key . ":" . $value->expression;
                }
            }
            return "{" . $str . "}";
        }
    }

    /**
     * Get the components to include in the app.
     *
     * @return string
     */
    public function generateComponents()
    {
<<<<<<< HEAD
        if (!empty($this->components)) {
=======
        if(!empty($this->components)){
>>>>>>> 73784c89c3a1883b542ff2b90b7a145538057f54
            return json_encode($this->components);
        }
    }

<<<<<<< HEAD
    public function generateWatch()
    {
        if (is_array($this->watch) && !empty($this->watch)) {
=======
    public function generateWatch() {
        if(is_array($this->watch) && !empty($this->watch)){
>>>>>>> 73784c89c3a1883b542ff2b90b7a145538057f54
            $str = '';
            foreach ($this->watch as $key => $value) {
                if ($value instanceof \yii\web\JsExpression) {
                    $str .= $key . ":" . $value->expression;
                }
            }
            return "{" . $str . "}";
        }
    }

<<<<<<< HEAD
    public function generateComputed()
    {
        if (is_array($this->computed) && !empty($this->computed)) {
=======
    public function generateComputed() {
        if(is_array($this->computed) && !empty($this->computed)){
>>>>>>> 73784c89c3a1883b542ff2b90b7a145538057f54
            $str = '';
            foreach ($this->computed as $key => $value) {
                if ($value instanceof \yii\web\JsExpression) {
                    $str .= $key . ":" . $value->expression;
                }
            }
            return "{" . $str . "}";
        }
    }

<<<<<<< HEAD
    public function component($tagName, $option)
    {
=======
    public function component($tagName, $option) {
>>>>>>> 73784c89c3a1883b542ff2b90b7a145538057f54
        $option = json_encode($option);
        $this->view->registerJs("
            Vue.component($tagName, $option);
            ");
    }
}
