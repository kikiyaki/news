<?php

namespace app\lib\Parsing;

/**
 * Life news parser
 *
 * @author Kirill Yakovlev
 */
class LifeParsedNews implements ParsedNews
{
    private $limitNews;
    private $url = 'https://api.corr.life/public/sections/5e01383bf4352e43d960b258/posts?after=1617621518036';

    public function __construct($limitNews)
    {
        $this->limitNews = $limitNews;
    }

    public function newsList(): array
    {
        $newsList = [];
        $newsData = file_get_contents($this->url);
        $newsData = json_decode($newsData, true);
        foreach ($newsData['data'] as $key => $news) {
            if ($key >= $this->limitNews) {
                break;
            }

            $newsList[] = [
                'news_id' => $news['_id'],
                'title' => $news['title'],
                'url' => "https://life.ru/p/$news[index]",
                'img_url' => $news['cover']['url']
            ];
        }

        return $newsList;
    }

    public function sourceName(): string
    {
        return 'Life';
    }
}