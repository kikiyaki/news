<?php

namespace app\commands;

use app\lib\Parsing\LifeParsedNews;
use app\lib\Parsing\ParsedNews;
use app\models\News;
use yii\console\Controller;
use yii\console\ExitCode;

/**
 * Parse news api, save news to the db
 *
 * Run command line:
 * php yii parse-news
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
        $lifeParsedNews = new LifeParsedNews(20);
        $this->parse($lifeParsedNews);

        return ExitCode::OK;

    }

    /**
     * Write parsed news to the db
     *
     * @param ParsedNews $parsedNews
     */
    private function parse(ParsedNews $parsedNews)
    {
        $sourceName = $parsedNews->sourceName();
        foreach ($parsedNews->newsList() as $news) {
            $createdNews = new News();
            $createdNews->news_id = $news['news_id'];
            $createdNews->title = $news['title'];
            $createdNews->url = $news['url'];
            $createdNews->img_url = $news['img_url'];
            $createdNews->source = $sourceName;
            $createdNews->save();
        }
    }
}
