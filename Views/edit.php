<?php layout('header'); ?>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <h1>Edit post</h1>
            <? if (session()->get('mess')): ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->get('mess'); unset($_SESSION['mess']) ?>
                </div>
            <?endif;?>
            <div class="card card-fix-edit">
                <div class="card-body">
                    <form action="editPost" method="post" class="my_form" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?=$data['id']?>">
                        <div class="form-group">
                            <label for="name">Edit name</label>
                            <input type="text" name="name" placeholder="Post name" id="name" class="form-control"
                                   value="<?=$data['name']?>">
                        </div>
                        <div class="form-group">
                            <label for="text">Edit text</label>
                            <textarea name="text" placeholder="Post text" id="text" class="form-control"
                                      rows="10"><?=$data['text']?></textarea>
                        </div>

                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Upload image</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="file_path" name="file_path">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Save" class="btn btn-success">
                            <a href="/" class="btn btn-primary">To list</a>
                            <a href="#" class="btn btn-danger">Delete</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php layout('footer'); ?>
