<?php

namespace inquid\vue\classes;

use yii\web\JsExpression;

class Mounted implements VueJsExpressionContract
{
    /**
     * @param array $expressions
     */
    public function formatJsExpression(array $expressions): JsExpression
    {
        $expressionsValues = '';
        foreach ($expressions as $expression){
            $expressionsValues = " {$expression} ";
        }

        return $this->result($expressionsValues);
    }

    /**
     * @inheritdoc
     */
    public function result(string $expression = ''): JsExpression
    {
        return new JsExpression("function(){
            console.log('Vue APP Mounted!');
            {$expression} 
        }");
    }
}
