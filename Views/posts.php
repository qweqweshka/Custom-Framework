<?php layout('header'); ?>

<div id="content2">
    <div class="container">
        <?foreach ($data as $elem):?>
        <div class="page-content page-container" id="page-content">
            <div class="padding">
                <div class="row">
                    <div class="col-sm-6" style="width: 70%;">
                        <div class="list list-row block">
                            <div class="list-item" data-id="19">
                                <div><a href="#" data-abc="true"><span class="w-48 avatar gd-warning">S</span></a></div>
                                <div class="flex"> <a href="#" class="item-author text-color" data-abc="true">Sam Kuran</a>
                                    <div class="item-except text-muted text-sm h-1x">For what reason would it be advisable for me to think about business content?</div>
                                </div>
                                <div class="no-wrap">
                                    <div class="item-date text-muted text-sm d-none d-md-block">13/12 18</div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <?endforeach;?>
        </div>
    </div>

<?php layout('footer'); ?>
