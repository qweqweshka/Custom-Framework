<?php layout('header'); ?>


<?
//seedArticles();
//clearArticles();
?>


    <div id="content">
        <div class="container-fluid">
            <div class="row">
                <? foreach ($data['items'] as $elem): ?>
                    <div class="try col-md-3 mb-5">
                        <div class="card" style="width: 18rem;">
                            <img src="../<?= $elem['file_path'] ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?= mb_strimwidth($elem['name'], 0, 25, '...') ?></h5>
                                <p class="card-text"><?= mb_strimwidth($elem['text'], 0, 120, '...') ?></p>
                                <p class="text-muted">Author: <a href=""
                                                                 class="text-muted"><strong><?= $elem['user_id'] ?></strong></a>
                                </p>
                                <? if (session()->get('auth') == true): ?>
                                    <a href="<?= route('show', ['id' => $elem['id']]) ?>" class="btn btn-primary">Details</a>
                                    <? if (isAdmin() || isModerator()): ?>
                                        <a href="<?= route('edit', ['id' => $elem['id']]) ?>" type="button" class="btn btn-success">Edit</a>
                                        <a href="<?= route('delete', ['id' => $elem['id']]) ?>" type="button" class="btn btn-danger">Delete</a>
                                    <? endif; ?>
                                <? else: ?>
                                    <a href="login" type="button" class="btn btn-secondary" data-toggle="tooltip"
                                       data-html="true"
                                       title="To watch details, please login">Details</a>
                                <? endif; ?>
                            </div>
                        </div>
                    </div>
                <? endforeach; ?>
            </div>
        </div>
    </div>

    </main>
    <div class="container pagination">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="/?page=<?= 1 ?>">First</a></li>
                <? for ($i = 1; $i <= $data['totalPages']; $i++) : ?>
                    <li class="page-item"><a class="page-link" href="/?page=<?= $i ?>"><?= $i ?></a></li>
                <? endfor; ?>
                <li class="page-item"><a class="page-link" href="/?page=<?= $data['totalPages'] ?>">Last</a>
                </li>
            </ul>
        </nav>
    </div>

<?php layout('footer'); ?>