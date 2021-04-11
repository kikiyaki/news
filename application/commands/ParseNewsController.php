<?php

namespace app\commands;

use app\models\News;
use yii\console\Controller;
use yii\console\ExitCode;

/**
 * Parse news api, save news to the db
 *
 * @author Kirill Yakovlev
 */
class ParseNewsController extends Controller
{
    /**
     * @return int Exit code
     */
    public function actionIndex()
    {
        $url = 'https://api.corr.life/public/sections/5e01383bf4352e43d960b258/posts?after=1617621518036';
        $newsData = file_get_contents($url);
        $newsData = json_decode($newsData, true);
        foreach ($newsData['data'] as $news) {
            $news = new News();
            $news->news_id = $news['_id'];
            $news->title = $news['title'];
            $news->url = "https://life.ru/p/$news[index]";
            $news->img_url = $news['cover']['url'];
            $news->save();
        }

        return ExitCode::OK;
    }
}
