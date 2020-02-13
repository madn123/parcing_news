<?php
require_once('include/include.php');

$news_sources = get_sources();
$articles = [];
foreach ($news_sources as $source) {
    $articles = get_articles($source);
    foreach ($articles as $article) {
        save_article($article);
    }
}
phpQuery::unloadDocuments();
die();
