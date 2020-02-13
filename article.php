<?php
require_once('include/include.php');

$id = $_REQUEST['id'];

$art = R::getAll('
        SELECT articles.*,sources.name FROM articles
        JOIN sources ON articles.source_id = sources.id
        WHERE articles.id = ?', [$id]);

print render('article', ['art' => $art]);