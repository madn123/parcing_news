<?php
require('phpQuery/phpQuery.php');
$link = 'http://www.horeca.ru/news/restaurant/17458/';
$selector = '.lSpaceBig';;
$content = file_get_contents($link);
$doc = phpQuery::newDocument($content);
$a = $doc->find($selector);
echo $a;
phpQuery::unloadDocuments();
die();