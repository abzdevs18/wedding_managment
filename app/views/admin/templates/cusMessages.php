<div class="request_icon_wrapper message_header_chat">
    <?php foreach($data['header'] AS $im) : ?>
        <?php if($im->imagePath): ?>
            <div class="req_icon m_notif_icon message_icon" style="margin:8px;">
                <span>K</span>
            </div>
        <?php else :?>
            <div class="req_icon m_notif_icon message_icon" style="margin:8px;">
                <span><?=ucwords($im->firstN[0])?></span>
            </div>
        <?php endif;?>
        <div class="m_notif_content">										
            <div class="m_tag_time" style="opacity:0;">
                <b>Kate Saycon</b>
            </div>
            <h3><?=ucfirst($im->firstN) . ' ' . ucfirst($im->lastN)?></h3>								
            <?php if($im->uStatus) : ?>
                <time datetime="2017-08-08"><i class="fas fa-circle" style="color:green;font-size:9px;"></i> Online</time>
            <?php else: ?>
                <time datetime="2017-08-08"><i class="fas fa-circle" style="color:red;font-size:9px;"></i> Offline</time>
            <?php endif;?>
        </div>
    <?php endforeach;?>
</div>

<div class="message-container mCustomScrollbar messaging fluid light" data-mcs-theme="inset-2-dark" style="flex-direction:column-reverse;max-height:100% !important;overflow:hidden;overflow-y:scroll !important;">
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
</div>