<?php layout('header'); ?>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <h1>Create post</h1>
                <div class="card card-fix-edit">
                    <div class="card-body">
                        <form action="createPost" method="post" class="my_form" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name">Post name</label>
                                <input type="text" name="name" id="name" class="form-control"
                                       value="">
                            </div>
                            <div class="form-group">
                                <label for="text">Post text</label>
                                <textarea name="text" id="text" class="form-control"
                                          rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="file" class="form-control-file" id="file_path" name="file_path">
                            </div>
                            <div class="form-group">

                                <input type="submit" value="Create" class="btn btn-success">
                                <a href="/" class="btn btn-primary">To list</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php layout('footer'); ?>