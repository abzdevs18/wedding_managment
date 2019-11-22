<?php if($data['latestM']): ?>
    <?php foreach($data['latestM'] AS $msg): ?>
        <?php if($msg->receiverId == $_SESSION['uId']) : ?>
        <div class="message-reciever">
            <img src="<?=URL_ROOT?>/img/icons/small-prof.jpg" />
            <div class="msg-content">
                <p><?=$msg->msgContent?></p>
                <span><?=$msg->msgDate?></span>
            </div>
        </div>
        <?php else: ?>
        <div class="current-user-sender" style="justify-content: right;">
            <div class="msg-content">
                <p><?=$msg->msgContent?></p>
                <span><?=$msg->msgDate?> <i class="far fa-check"></i></span>
            </div>
            <img src="<?=URL_ROOT?>/img/icons/small-prof.jpg" style="width:20px;height:20px;" />
        </div>
        <?php endif;?>
    <?php endforeach;?>
<?php endif;?>