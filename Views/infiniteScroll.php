<? foreach ($data['items'] as $elem): ?>
    <div class="try col-md-3 mb-5">
        <div class="card card-articles" style="width: 20rem;">
            <? if ($elem['file_path'] != 'test.jpg'): ?>
                <img src="<?= $elem['file_path'] ?>" class="card-img-top art-img" alt="R I P">
            <? else: ?>
                <img src="https://i.kym-cdn.com/entries/icons/original/000/011/307/Screen_Shot_2012-09-13_at_9.39.39_AM.png"
                     class="card-img-top" alt="R I P">
            <? endif; ?>
            <div class="card-body">
                <h5 class="card-title"><?= mb_strimwidth($elem['name'], 0, 25, '...') ?></h5>
                <p class="card-text"><?= mb_strimwidth($elem['text'], 0, 120, '...') ?></p>
                <p class="text-muted">Author: <a href=""
                                                 class="text-muted"><strong><?= $elem['user_id'] ?></strong></a>
                </p>
                <? if (session()->get('auth') == true): ?>
                    <a href="<?= route('show', ['id' => $elem['id']]) ?>"
                       class="btn btn-primary">Details</a>
                    <? if (isAdmin() || isModerator()): ?>
                        <a href="<?= route('edit', ['id' => $elem['id']]) ?>" type="button"
                           class="btn btn-success">Edit</a>
                        <a href="<?= route('delete', ['id' => $elem['id']]) ?>" type="button"
                           class="btn btn-danger">Delete</a>
                        <a href="<?= route('block', ['id' => $elem['id']]) ?>" type="button"
                           class="btn btn-warning">Block</a>
                    <? endif; ?>
                <? else: ?>
                    <a href="login" type="button" class="btn btn-secondary"
                       data-toggle="tooltip"
                       data-html="true"
                       title="To watch details, please login">Details</a>
                <? endif; ?>
            </div>
        </div>
    </div>
<? endforeach; ?>



