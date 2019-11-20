
    <!-- <div class="slick-track" style="opacity: 1; width: 5357px; transform: translate3d(-1948px, 0px, 0px);"> -->
<?php foreach($data['samples'] AS $samples) : ?>    
    <div class="img_box" style="background:url('<?=URL_ROOT;?>/img/test/<?=$samples->image_path?>');height:300px;">
    </div>
<?php endforeach;?>
<!-- </div> -->
