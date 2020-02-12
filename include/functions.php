<?php
/**
 * Подключает шаблон, передает туда данные и возвращает итоговый HTML контент
 * @param string $name Путь к файлу шаблона относительно папки templates
 * @param array $data Ассоциативный массив с данными для шаблона
 * @return string Итоговый HTML
 */
function include_template($name, $data)
{
    $name = 'templates/' . $name;
    $result = '';

    if (!file_exists($name)) {
        return $result;
    }

    ob_start();
    extract($data);
    require $name;

    $result = ob_get_clean();

    return $result;
}

/**
 * Передает данные в шаблон для подключения.
 * @param string $template Название шаблона в види строки
 * @param string $title Название страницы в виде строки
 * @param array $data Массив с данными для вывода в шаблоне
 * @return string $layout_content Возвращает шаблоны с внесенными данными.
 */
function render($template, $data = [])
{
    $page_content = include_template($template . '.php', $data);
    $layout_content = include_template('layout.php', [
        'content' => $page_content
    ]);
    return $layout_content;
}

// Достаем источники из БД
function get_sources()
{
    $links = R::getAll('SELECT * FROM sources');
    return $links;
}

// Берем источники, достаем ссылки и получаем контент
function get_articles($source)
{
    $links = get_links($source['url'], $source['link_selector']);
    $result = [];
    foreach ($links as $link) {
        $result[] = [
            'title' => trim(parse_article($link, $source['title_selector'])),
            'content' => trim(parse_article($link, $source['content_selector'])),
            'url' => $link,
            'source_id' => $source['id']
        ];
    }
    return $result;
}

// Достаем ссылки на статьи
function get_links($link, $selector)
{
    preg_match('/.*\.ru/', $link, $url);
    $result = [];
    $content = file_get_contents($link);
    $doc = phpQuery::newDocument($content);
    $a = $doc->find($selector);
    foreach ($a as $b) {
        $c = pq($b);
        $result[] = $url[0] . $c->attr('href');
    }
    return $result;
}

// Достаем контентую часть из ссылок
function parse_article($link, $selector)
{
    sleep(1);
    $content = file_get_contents($link);
    $doc = phpQuery::newDocument($content);
    $a = $doc->find($selector);
    return $a->text();
}

//Задаем новостям уникальный id, делаем проверку на уникальность, сохраняем в БД
function save_article($article)
{
    $title = mb_strtolower(mb_eregi_replace("[^a-zа-яё0-9]", '', $article['title']));
    $art_id = md5($title . $article['url']);

    $exist = R::getAll('SELECT `id` FROM `articles` WHERE `art_id` = ?', [$art_id]);
    if (!empty($exist)) {
        echo 'Такая новость уже есть!', PHP_EOL;
        return false;
    }

    $table = R::dispense('articles');
    $table->title = $article['title'];
    $table->url = $article['url'];
    $table->art_id = $art_id;
    $table->content = $article['content'];
    $table->parsing_date = date("Y-m-d H:i:s");
    $table->source_id = $article['source_id'];
    R::store($table);
    return true;
}