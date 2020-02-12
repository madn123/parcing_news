<h2>Редактирование статьи</h2>
<form action="edit.php" method="post">
    <input type="hidden" name="id" value="<?= ($art['id']); ?>">
    <div class="form-group">
        <label for="title">Название статьи</label>
        <textarea class="form-control" id="title" name="title" rows="2"><?= $art['title']; ?></textarea>
    </div>
    <div class="form-group">
        <label for="text">Текст статьи</label>
        <textarea class="form-control" id="text" name="text" rows="20"><?= $art['content']; ?></textarea>
    </div>
    <button type="submit" class="btn btn-success">Сохранить изменения</button>
    <a class="btn btn-primary btn-secondary" href="article.php?id=<?= $art['id']; ?>" role="button">Вернуться</a>
</form>
<br>