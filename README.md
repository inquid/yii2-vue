vuejs
=====
for yii2 web application 

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require inquid/yii2-vue "*"
```

or add

```
"inquid/yii2-vue": "*"
```

to the require section of your `composer.json` file.


Usage
----- 

Once the extension is installed, simply use it in your code by  :

```php
<?php
use inquid\vue\Vue;
?>
<?php Vue::begin([
    'id' => "vue-app",
    'data' => [
        'userModel' => User::findOne(Yii::$app->user->id),
        'message' => "hello",
        'seen' => false,
        'todos' => [
            ['text' => "aa"],
            ['text' => "akbar"]
        ]
    ],
    'methods' => [
        'reverseMessage' => new yii\web\JsExpression("function(){"
                . "this.message =1; "
                . "}"),
    ]
]); ?>
    
    <p>{{ message }}</p>
    <button v-on:click="reverseMessage">Reverse Message</button>
    
    <p v-if="seen">Now you see me</p>
    
    
    <ol>
        <li v-for="todo in todos">
          {{ todo.text }}
        </li>
    </ol>
    
    <p>{{ message }}</p>
    <input v-model="message">
  
  
<?php Vue::end(); ?>
```

# Plugins
For complex usages it is sometimes necessary to isolate code in different files and use the advatages that Object Oriented Programming gives you that is why we crated a plugin pattern that you can use in the following way:

* Create a Plugin provider class:
```php
<?php

use inquid\vue\plugins\BasePluginProvider;
use ExamplePlugin;

/**
 * Plugin provider.
 *
 * Class PluginProvider
 * @package app\modules\PuntoVenta\plugins
 */
class PluginProvider extends BasePluginProvider
{
    /**
     * {@inheritDoc}
     */
    public function loadPlugins(array $config): array
    {
        $config = $this->pluginService->loadPlugins(parent::loadPlugins($config), [
            new ExamlePlugin()
        ]);

        return $config;
    }
}
```

* Create a Plugin

```php

use yii\web\JsExpression;

/**
 * Contains the config information of the application
 */
class ExamplePlugin extends BasePlugin
{
    /**
     * {@inheritDoc}
     */
    public function getId(): string
    {
        return 'example_plugin';
    }

    /**
     * {@inheritDoc}
     */
    public function getName(): string
    {
        return 'Example Plugin';
    }
    
    /**
     * {@inheritdoc}
     */
    public function getData(): array
    {
        $myConfig1 = 'config_1';

        return [
            'config1' => $myConfig1
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getMethods(): array
    {
        return [
            'getConfig1' => new JsExpression("function () {
                alert(this.config1);
            },"),
        ];
    }
}
```

* Add the plugin provider to your widget, **all properties used in the widget and in the plugins will be merged**.

```php
<?php
use inquid\vue\Vue;
use PluginProvider;
?>
<?php Vue::begin([
    'id' => "vue-app",
    'data' => [
        'userModel' => User::findOne(Yii::$app->user->id),
        'message' => "hello",
        'seen' => false,
        'todos' => [
            ['text' => "aa"],
            ['text' => "akbar"]
        ]
    ],
    'methods' => [
        'reverseMessage' => new yii\web\JsExpression("function(){"
                . "this.message =1; "
                . "}"),
    ]
], new PluginProvider()); // Added the pluginprovider to be used in the widget ?>
    
    <p>{{ message }}</p>
    <p>{{ config_1 }}</p> <!-- variable from the plugin -->
    <button v-on:click="reverseMessage">Reverse Message</button>
    <button v-on:click="getConfig1">Get Variable From Plugin</button>
    
    <p v-if="seen">Now you see me</p>
    
    
    <ol>
        <li v-for="todo in todos">
          {{ todo.text }}
        </li>
    </ol>
    
    <p>{{ message }}</p>
    <input v-model="message">
  
  
<?php Vue::end(); ?>
```

