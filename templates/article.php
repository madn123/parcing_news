<div class="art_title">
    <h1><?= $art[0]['title']; ?></h1>
</div>


<a class="btn btn-outline-info" href="edit.php?id=<?= $art[0]['id']; ?>" role="button">Редактировать новость</a>

<form class="form-inline" action="index.php" method="post">

    <input type="hidden" name="status" value="<?= ($art[0]['id']); ?>">


    <?php if ($art[0]['status'] == 0): ?>
        <button class="btn btn-outline-success" role="button">Принять новость</button>
    <?php endif ?>
</form>

<form class="form-inline" action="index.php" method="post">
    <input type="hidden" name="del" value="<?= ($art[0]['id']); ?>">
    <button type="submit" class="btn btn-outline-danger" role="button">Удалить новость</button>
</form>
<hr>

<div class="art_text">
    <p><?= $art[0]['content']; ?></p>
    <i>Источник: <span class="badge badge-warning"><?= $art[0]['name']; ?></span></i>
</div>
<hr>
<a class="btn btn-primary btn-primary btn-block" href="/" role="button">Назад</a>
<hr>