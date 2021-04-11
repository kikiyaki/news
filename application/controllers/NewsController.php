<?php

namespace app\controllers;

use app\models\News;
use yii\rest\ActiveController;

/**
 * Class NewsController
 *
 * @author Kirill Yakovlev
 */
class NewsController extends ActiveController
{
    public $modelClass = 'app\models\News';

    public function actionIndex()
    {
        return News::find()->all();
    }
}