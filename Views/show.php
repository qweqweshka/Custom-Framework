<?php layout('header'); ?>



<div id="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12"></div>
            <div class="card card-fix">
                <img src="../<?=$data['file_path']?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?=$data['name']?></h5>
                    <p class="card-text"><?=$data['text']?></p>
                    <a href="/" class="btn btn-primary">To list</a>
                    <? if (isAdmin() || isModerator()): ?>
                        <a href="<?= route('edit', ['id' => $data['id']]) ?>" type="button" class="btn btn-success">Edit</a>
                        <a href="delete" type="button" class="btn btn-danger">Delete</a>
                    <? endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>


<?php layout('footer') ?>
