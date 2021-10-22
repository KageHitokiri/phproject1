<?php if("POST" === $_SERVER["REQUEST_METHOD"]) :?>
    <div class="alert alert-<?=(empty($errors) ? 'info': 'danger');?> alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">x</span>
        </button>
        <div><?=$info;?>
        </div>
        <?php  if (!empty($errors)) : ?>
            <ul>
                <?php foreach($errors as $error) : ?>
                    <li><?=$error;?></li>
                <?php endforeach;?>
                </ul>
        <?php endif; ?>
    </div>
<?php endif;?>