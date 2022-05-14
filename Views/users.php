<?php layout('header');?>
<div id="content2">
<div class="container-fluid">
    <div class="row">
    <?foreach ($data['items'] as $elem):?>
        <div class="try col-md-3 mb-5">
    <div class="card card-users" style="width: 18rem;">
        <div class="upper"> <img src="https://i.imgur.com/Qtrsrk5.jpg" class="img-fluid"> </div>
        <div class="user text-center">
             <img src="<?=$elem['file_path']?>" class="rounded-circle" width="100">
        </div>
        <div class="mt-2 text-center">
            <h4 class="mb-0"><?=$elem['name'] . ' ' . $elem['surname']?></h4> <span class="text-muted d-block mb-2">Los Angles</span>
<!--            <button class="btn btn-primary btn-sm follow">Follow</button>-->
            <div class="d-flex justify-content-between align-items-center mt-4 px-4">
                <div class="stats">
                    <h6 class="mb-0">#</h6> <span>#</span>
                </div>
                <div class="stats">
                    <h6 class="mb-0">Projects</h6><span><a href="<?=route('posts', ['id' => $elem['id']])?>"><?=postsCount($elem['id'])?></a></span>
                </div>
                <div class="stats">
                    <h6 class="mb-0">#</h6> <span>#</span>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?endforeach;?>
    </div>
</div>
</div>

<?php layout('footer');?>
