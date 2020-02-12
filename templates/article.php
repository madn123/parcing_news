<div class="art_title">
    <h1><?= $art[0]['title']; ?></h1>
</div>
<a class="btn btn-outline-info" href="edit.php?id=<?= $art[0]['id']; ?>" role="button">Редактировать новость</a>

<?php if ($art[0]['status'] == 0): ?>
    <a class="btn btn-outline-success" href="/?status=true&id=<?= $art[0]['id']; ?>" role="button">Принять новость</a>
<?php endif ?>

<a class="btn btn-outline-danger" href="/?hidden=true&id=<?= $art[0]['id']; ?>" role="button">Удалить новость</a>
<hr>
<div class="art_text">
    <p><?= $art[0]['content']; ?></p>
    <i>Источник: <span class="badge badge-warning"><?= $art[0]['name']; ?></span></i>
</div>
<hr>
<a class="btn btn-primary btn-primary btn-block" href="/" role="button">Назад</a>
<hr>