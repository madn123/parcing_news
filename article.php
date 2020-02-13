<?php
require_once('include/include.php');

$id = isset($_REQUEST['id']) ? intval($_REQUEST['id']) : 0;
if (empty($id)){
    header("Location: /");
}

$art = R::getAll('
    SELECT articles.*,sources.name FROM articles
    JOIN sources ON articles.source_id = sources.id
    WHERE articles.id = ?', [$id]);

print render('article', ['art' => $art]);