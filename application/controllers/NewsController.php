<?php

namespace app\controllers;

use yii\rest\ActiveController;

/**
 * Class NewsController
 *
 * @author Kirill Yakovlev
 */
class NewsController extends ActiveController
{
    public $modelClass = 'app\models\News';
}