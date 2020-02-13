<?php
require_once('include/include.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['del'])){
        $article = R::load('articles', $_POST['del']);
        $article->hidden = true;
        R::store($article);
        header("Location: /");
    }
    $article = R::load('articles', $_POST['status']);
    $article->status = 1;
    R::store($article);
    header("Location: /");
}

$cur_page = intval($_GET['page'] ?? 1);
$page_items = 10;
$items_count = R::count('articles');
$pages_count = ceil($items_count / $page_items);
$offset = ($cur_page - 1) * $page_items;
$pages = range(1, $pages_count);

$tables = R::getAll('
    SELECT articles.*,sources.name FROM articles
    JOIN sources ON articles.source_id = sources.id
    WHERE hidden = ? 
    ORDER BY articles.id ASC 
    LIMIT ? OFFSET ?', [0, $page_items, $offset]);

$count = R::count('articles', 'hidden = ?', [0]);
$deleted = R::count('articles', 'hidden = ?', [1]);
$accepted = R::count('articles', 'status = ?', [1]);
$unchecked = R::count('articles', 'status = ?', [0]);
$unchecked = $unchecked - $deleted;

print render('main', [
    'tables' => $tables,
    'pages' => $pages,
    'pages_count' => $pages_count,
    'cur_page' => $cur_page,
    'count' => $count,
    'accepted' => $accepted,
    'unchecked' => $unchecked,
    'deleted' => $deleted
]);