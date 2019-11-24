
<!-- if job is close add row with class name "sold" -->
<?php if($data['bookings']) : ?>
    <?php foreach($data['bookings'] AS $bookings) : ?>
        <tr class="req_logs_ bookingD" data-bId="<?=$bookings->user_id?>">
            
            <td>
                <div class="request_icon_wrapper">
                    <?php if($bookings->imgProf): ?>
                        <div class="req_icon">
                            <span>K</span>
                        </div>
                    <?php else :?>
                        <div class="req_icon">
                            <span><?=ucwords($bookings->fName[0])?></span>
                        </div>
                    <?php endif;?>
                    <div style="margin:5px;margin-top:0px;">
                        <h3><?=$bookings->title?></h3>
                        <time datetime="2017-08-08">Client ID: <span><?=$bookings->cusId?></span></time>
                    </div>
                </div>
            </td>
            <td class="tittle-id">
                <h3 style="color:orange;"><?=date("D. F j Y", strtotime($bookings->forCountDown));?></h3>
            </td>
            <td class="tittle-id">
                <h3><?=$bookings->location?></h3>
            </td>
            <td>
                <span class="budgetForWedding"><i class="far fa-ruble-sign"></i> P<?=number_format($bookings->budget);?>.00</span>
            </td>
            <!-- pendin #f91942 -->
            <!-- confirm #00cc67 -->
            <td class="status-job booking-status">
                <?php if($bookings->bookingStatus):?>
                    <span style="background-color:#00cc67;">Confirm</span>
                <?php else:?>
                    <span style="background-color:#f91942;">Pending</span>
                <?php endif;?>
            </td>
            <td class="action-btn" style="position:relative;">
                <i class="far fa-ellipsis-h-alt" style="font-size: 30px;color: #fe5894;"></i>
                <div class="action-request" style="display:flex;flex-direction:column;position:absolute;">
                    <button id="deleteBook" data-bId="<?=$bookings->bookingId?>">Delete</button>
                    <button id="confirmBook" data-bId="<?=$bookings->bookingId?>">Confirm</button>
                </div>
            </td>
        </tr>
    <?php endforeach; ?>
<?php endif; ?>