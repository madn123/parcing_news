<?php
require_once('include/include.php');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $id = isset($_REQUEST['id']) ? intval($_REQUEST['id']) : 0;
    if (empty($id)){
        header("Location: /");
    }
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