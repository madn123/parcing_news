<?php
require_once('include/config.php');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $id = $_REQUEST['id'];
    $art = R::findOne('articles', 'id = ?', [$id]);
    print render('edit', ['art' => $art]);
    die();
}

$form = $_POST;;
$article = R::load('articles', $form['id']);
$article->title = $form['title'];
$article->content = $form['text'];
R::store($article);
header("Location: article.php?id=" . $form['id']);