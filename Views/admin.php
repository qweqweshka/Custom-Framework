<?php layout('header'); ?>

<div id="content2">
    <div class="row">
        <h1 style="margin-top: -8px">Articles table</h1>
        <img src="../Storage/Images/minus.png" class="push" width="45" height="45">
    </div>
    <table class="table slideTable">
        <thead class="thead-light">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Text</th>
            <th scope="col">Author</th>
            <th scope="col">Last update</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        <? foreach ($data['articles']['items'] as $article): ?>
            <tr>
                <th scope="row"><?= $article['id'] ?></th>
                <td><?= mb_strimwidth($article['name'], 0, 25, '...') ?></td>
                <td><?= mb_strimwidth($article['text'], 0, 90, '...') ?></td>
                <td><?= $article['user_id'] ?></td>
                <td><?= $article['updated_at'] ?></td>
                <td><a href="<?= route('edit', ['id' => $article['id']]) ?>" class="btn btn-success">Update</a>
                    <a href="<?= route('delete', ['id' => $article['id']]) ?>" class="btn btn-danger">Delete </a>
                </td>
            </tr>
        <? endforeach; ?>
        </tbody>
    </table>
</div>
<?php layout('footer'); ?>
