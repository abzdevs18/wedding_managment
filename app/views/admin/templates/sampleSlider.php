
    <!-- <div class="slick-track" style="opacity: 1; width: 5357px; transform: translate3d(-1948px, 0px, 0px);"> -->
<?php if($data['samples']):?>
    <?php foreach($data['samples'] AS $samples) : ?>    
        <div class="img_box" style="background:url('<?=URL_ROOT;?>/img/test/<?=$samples->image_path?>');height:300px;background-position:center;background-repeat:no-repeat;background-size:cover;">
        </div>
    <?php endforeach;?>
<?php else : ?>
    <div class="img_box" style="background:#333;height:300px;display:inline;justify-content:center;">
        <span style="color:#fff;font-weight:bold;font-family: 'Roboto';">Nothing to show here</span>
    </div>
<?php endif;?>
