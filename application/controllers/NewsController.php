<?php

namespace app\controllers;

use app\models\News;
use yii\rest\ActiveController;
use yii\web\Request;

/**
 * Class NewsController
 *
 * @author Kirill Yakovlev
 */
class NewsController extends ActiveController
{
    public $modelClass = 'app\models\News';

    public function actionIndex(Request $request)
    {
        $limit = $request->get('limit', null);
        $offset = $request->get('offset', 0);
        return News::find()
            ->limit($limit)
            ->offset($offset)
            ->all();
    }

    public function actions()
    {
        $actions = parent::actions();
        //default index action overriding
        unset($actions['index']);
        return $actions;
    }
}