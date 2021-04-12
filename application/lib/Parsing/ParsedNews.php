<?php

namespace app\lib\Parsing;

/**
 * Interface ParsedNews
 * @author Kirill Yakovlev
 */
interface ParsedNews
{
    /**
     * @return array
     * [
     *  0 => [ 'news_id' => '', 'title' => '', 'url' => '', 'img_url' => '', ],
     *  ...
     * ]
     */
    public function newsList(): array;

    /**
     * News source name
     *
     * @return string
     */
    public function sourceName(): string;
}