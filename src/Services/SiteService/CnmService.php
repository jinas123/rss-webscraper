<?php
namespace RssScraper\Services\SiteService;

use RssScraper\Interfaces\IService;

class CnmService implements IService
{
    public static function dispatch($articles = [])
    {
        $articlesitems = array();

        $ecnm = new \RssScraper\Extractors\ECnm;
        
        foreach ($articles as $article) {
            $link = str_replace('http://vfp.mv', 'https://cnm.mv', $article["link"]);
            $date = $article["pubDate"];
            $articlesitems[] = $ecnm->extract($link, $date);
        }

        return $articlesitems;
    }
}