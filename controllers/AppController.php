<?php
/**
 * Created by PhpStorm.
 * User: listex51
 * Date: 5/1/20
 * Time: 5:32 PM
 */

namespace app\controllers;


use yii\web\Controller;

class AppController extends Controller
{

    public function debug($arr){
        echo '<pre>'.print_r($arr,true).'</pre>';
    }
}

function debug($arr){
    echo '<pre>'.print_r($arr,true).'</pre>';
}