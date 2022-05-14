<?php layout('header'); ?>


    <div id="content">
        <div class="container-fluid" id="row">
            <div class="row" id="articles">
                <? foreach ($data['items'] as $elem): ?>
                    <!--                    --><? // if ($elem['status'] == null): ?>
                    <div class="try col-md-3 mb-5">
                        <div class="card card-articles" style="width: 20rem;">
                           <div style="height: 200px; width: 100%; display: flex">
                               <? if ($elem['file_path'] != 'test.jpg'): ?>
                                   <img src="<?= $elem['file_path'] ?>" style="object-fit: cover;width: 100%;height: 100%;" class="card-img-top art-img" alt="R I P">
                               <? else: ?>
                                   <img src="https://i.kym-cdn.com/entries/icons/original/000/011/307/Screen_Shot_2012-09-13_at_9.39.39_AM.png"
                                        class="card-img-top" style="object-fit: cover;width: 100%;height: 100%;" alt="R I P">
                               <? endif; ?>
                           </div>
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
                    <!--                    --><? // endif; ?>
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


    <input type="hidden" id="page" value="2">
<input type="hidden" id="route" value="<?=route('scroll')?>">
    <script>
        let route = $('#route');
        let load = true;
        let page = $('#page');
        $(window).scroll(function (){
            if($(window).scrollTop() + $(window).height() > $(document).height() - 200) {
                if(load === true){
                    load = false;
                    console.log(page.val())
                    $.ajax({
                        url: 'scroll',
                        method: 'POST',
                        data: {'page': page.val()},
                        dataType: 'JSON' ,
                        success: function (res) {
                            page.val(res.nextPage);
                            $('#articles').append(res.html)
                            console.log('done');
                            if(res.nextPage > 0) {
                                load = true;
                            }
                        },
                        error: function () {
                            console.log('Error')
                        }
                    })
                }
            }
        });

    </script>

<?php layout('footer'); ?>