<div class="row">
    <div class="col-sm">
        <h3>Список доступных новостей <span class="badge badge-primary"><?= $count; ?></span></h3>
    </div>
    <div class="col-sm">
        <div class="checked">
            <p>Проверено новостей: <span class="badge badge-success"><?= $accepted; ?></span></p>
            <p>Не проверено: <span class="badge badge-danger"><?= $unchecked; ?></span></p>
        </div>
    </div>
</div>

<table class="table table-bordered">
    <thead>
    <tr>
        <th scope="col">id</th>
        <th scope="col">Название</th>
        <th scope="col">Дата парсинга</th>
        <th scope="col">Источник</th>
        <th scope="col">Проверено</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($tables as $table): ?>
        <tr>
            <td><?= $table['id']; ?></td>
            <td><a href="article.php?id=<?= $table['id']; ?>"><?= $table['title']; ?></a></td>
            <td><?= $table['parsing_date']; ?></td>
            <td><?= $table['name']; ?></td>
            <td>
                <?php if ($table['status'] == 0): ?>
                    <div class="alert alert-danger" role="alert">Нет</div>
                <?php else: ?>
                    <div class="alert alert-success" role="alert">Да</div>
                <?php endif ?>
            </td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>

<br>
<?php if ($pages_count > 1): ?>
    <nav aria-label="...">
        <ul class="pagination">
            <li class="page-item <?php if ($cur_page <= 1): ?>disabled<?php endif ?>"><a class="page-link"
                                                                                         href="/?page=<?= ($cur_page - 1); ?>">Назад</a>
            </li>
            <?php foreach ($pages as $page): ?>
                <li class="page-item <?php if ($page == $cur_page): ?>active<?php endif; ?>">
                    <a class="page-link" href="/?page=<?= $page; ?>"><?= $page; ?></a>
                </li>
            <?php endforeach; ?>
            <li class="page-item <?php if ($cur_page == $pages_count): ?>disabled<?php endif ?>"><a class="page-link"
                                                                                                    href="/?page=<?= ($cur_page + 1); ?>">Вперед</a>
            </li>
        </ul>
    </nav>
<?php endif; ?>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
