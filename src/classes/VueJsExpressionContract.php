<?php

namespace inquid\vue\classes;


use yii\web\JsExpression;

interface VueJsExpressionContract
{
    /**
     * @param array $expressions
     */
    public function formatJsExpression(array $expressions): JsExpression;

    /**
     * For this classes Vue only accepts one expression.
     *
     * eg. mounted()
     *
     * @param string $expression the JS expression without the class definition.
     * @return JsExpression the final result of the class.
     */
    public function result(string $expression = ''): JsExpression;
}
