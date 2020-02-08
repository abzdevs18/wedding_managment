
<section class="main-tbl-container">
    <div class="tbl-wrap" style="height: 80vh;border: var(--border);background-image:url('<?=URL_ROOT;?>/img/default/event_back.jpg');background-size: cover;background-repeat: no-repeat;background-position: center;">
    </div>
    <div class="wrap_time">
        <div class="time_date">
        <h2 id="days_counter">00</h2>
        <p>Days</p>
        </div>
        <div class="time_date">
        <h2 id="hour_counter">00</h2>
        <p>hours</p>
        </div>
        <div class="time_date">
        <h2 id="min_counter">00</h2>
        <p>minutes</p>
        </div>
        <div class="time_date">
        <h2 id="seconds_counter">00</h2>
        <p>seconds</p>
        </div>
    </div>
    <div class="counter_text" style="background: #33333363;margin: 0;padding: 10px;border-radius: 5px;">
        <span style="font-size: 25px;"><?=date("D. F j Y", strtotime($data['eventData']->forCountDown));?></span>
        <p>Wedding Day</p>
    </div>
</section>
<section class="main-tbl-container eventDetails">
    <section class="offices-msgs" style="display:flex;flex-direction:column;width:90%;">												
        <div class="request_icon_wrapper message_header_chat">
            <?php if($data['eventData']->imgProf): ?>
                <div class="req_icon m_notif_icon message_icon" style="margin:8px;">
                    <span>K</span>
                </div>
            <?php else :?>
                <div class="req_icon m_notif_icon message_icon" style="margin:8px;">
                    <span><?=ucwords($data['eventData']->fName[0])?></span>
                </div>
            <?php endif;?>
            <div class="m_notif_content">										
                <div class="m_tag_time" style="opacity:0;">
                    <b>Kate Saycon</b>
                </div>
                <h3 style="margin-bottom:2px;"><?=$data['eventData']->title?></h3>
                <time datetime="2017-08-08">Client ID: <span><?=$data['eventData']->cusId?></span></time>	
            </div>
            <div class="prof-container" style="position:relative;">
                <div>
                    <?php if(($data['bookStatus']) && ($data['bookStatus']->bookStat == 0)) : ?>
                        <span class="tg-btn save-btn bookEvent" type="button" style="background:#f91942;text-transform:capitalize;position: absolute;right: 0;margin: 7px 7px;padding: 0 30px;line-height: 3;" data-eId="<?=$data['eventData']->id?>">Pending request</span>
                        
                    <?php elseif(($data['bookStatus']) && ($data['bookStatus']->bookStat == 1)) : ?>
                        <span class="tg-btn save-btn bookEvent" type="button" style="text-transform:capitalize;position: absolute;right: 0;margin: 7px 7px;padding: 0 30px;line-height: 3;" data-eId="<?=$data['eventData']->id?>">Confirmed Book</span>
                    <?php else:?>
                        <span class="tg-btn save-btn bookEvent" type="button" style="text-transform:capitalize;position: absolute;right: 0;margin: 7px 7px;padding: 0 30px;line-height: 3;" data-eId="<?=$data['eventData']->id?>">Book request</span>
                    <?php endif;?>
                </div>
            </div>
        </div>
        <div stlye="display:flex;flex-direction:row;width: 66.66%;">
            <div id="profile-timeline">
                        <div class="prof-data">
                            <ul>
                                <li data-tab="about" class="active-prof-tab"><i class="fal fa-address-card"></i> Event</li>
                                <li data-tab="photog"><i class="fal fa-shield-alt"></i> Photographer</li>
                                <li data-tab="attire"><i class="fal fa-tshirt"></i> Attire & Beauty</li>
                                <li data-tab="food"><i class="fas fa-burger-soda"></i> Food</li>
                                <li data-tab="flower"><i class="fal fa-flower-tulip"></i> Flowers</li>
                            </ul>
                        </div>
                        <div class="bio-info">
                            <div class="bio">
                                <p class="bio-head">Event information <i class="far fa-pencil-alt"></i></p>	
                                <div class="bio-d-list">
                                    <div class="bio-d">
                                        <p>Groom:</p>
                                        <span><?=$data['eventData']->groom?></span>
                                    </div>
                                    <div class="bio-d">
                                        <p>Bride:</p>
                                        <span><?=$data['eventData']->bride?></span>
                                    </div>
                                    <!-- <div class="bio-d">
                                        <p>Budget:</p>
                                        <span>P<?=number_format($data['eventData']->budget);?>.00</span>
                                    </div> -->
                                    <div class="bio-d">
                                        <p>Location:</p>
                                        <span><?=$data['eventData']->location;?></span>
                                    </div>
                                    <!-- <div class="bio-d">
                                        <p>Site:</p>
                                        <span class="f-site-link"><?=URL_ROOT . '/frontend/' . $_SESSION['uId'];?></span>
                                    </div> -->
                                </div>					
                            </div>
                            <!-- <div class="bio">
                                <p class="bio-head">Reception information</p>
                                <div class="bio-d-list" style="height:500px;background:#333;border-radius:5px;">
                                    <h3>Map Here(MAybe)</h3>
                                </div>							
                            </div>					 -->
                        </div>
                        <div class="photog" style="display: none;">
                            <div class="job-list-tables tbl-container-inventory">
                                <table class="table-custom">
                                    <thead>
                                        <tr>
                                            <th>Photographer <sup><i class="fal fa-question-circle" style="font-size:12px;" title="Click the photo of photographer to see sample work."></i></sup></th>
                                            <th>Service Fee</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="resultTables">
                                        <?php if($data['bookedPhotogVendor']) : ?>
                                            <?php foreach($data['bookedPhotogVendor'] AS $photographer): ?>
                                                <tr class="table-inventory req_logs_ photog_wrapper" data-uid="<?=$photographer->vendorId?>" data-name="<?=$photographer->vendorN?>" data-fee="<?=number_format($photographer->serviceP)?>.00" data-vt="<?=$photographer->vType?>">						
                                                    <td class="tittle-id" valign="middle">
                                                        <h3><?=$photographer->vendorN?></h3>
                                                        <!-- <span>Chemical ID: 20190321341</span> -->
                                                    </td> 
                                                    <td class="item-cat" valign="middle">
                                                        <span id="serviceFee">P<?=number_format($photographer->serviceP)?>.00</span>	
                                                    </td>
                                                    <!-- pendin #f91942 -->
                                                    <!-- confirm #00cc67 -->
                                                    <td class="status-job booking-status">
                                                        <?php if($photographer->vendorStatus):?>
                                                            <span style="background-color:#00cc67;">Confirm</span>
                                                        <?php else:?>
                                                            <span style="background-color:#f91942;">Pending</span>
                                                        <?php endif;?>
                                                    </td>
                                                    <td class="action-btn">
                                                        <i class="far fa-ellipsis-h-alt" style="font-size: 30px;color: #fe5894;"></i>
                                                    </td>
                                                </tr>
                                            <?php endforeach;?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div><!-- End of Table Design -->					
                        </div>
                        <div class="prof-fed attire feed-container mCustomScrollbar content fluid light" data-mcs-theme="inset-2-dark" style="height: 385px;display: none;">

                            <div class="job-list-tables tbl-container-inventory">
                                <table class="table-custom">
                                    <thead>
                                        <tr>
                                            <th>Name of Beauty Shop</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="resultTables">
                                        <?php if($data['bookedAttireVendor']) : ?>
                                            <?php foreach($data['bookedAttireVendor'] AS $attire): ?>
                                                <tr class="table-inventory req_logs_ photog_wrapper" data-uid="<?=$attire->vendorId?>" data-name="<?=$attire->vendorN?>" data-fee="<?=number_format($attire->serviceP)?>.00" data-vt="<?=$attire->vType?>">						
                                                    <td class="tittle-id" valign="middle">
                                                        <h3><?=$attire->vendorN?></h3>
                                                        <!-- <span>Chemical ID: 20190321341</span> -->
                                                    </td> 
                                                    <td class="item-cat" valign="middle">
                                                        <span id="serviceFee">P<?=number_format($attire->serviceP)?>.00</span>	
                                                    </td>
                                                    <!-- pendin #f91942 -->
                                                    <!-- confirm #00cc67 -->
                                                    <td class="status-job booking-status">
                                                        <?php if($attire->vendorStatus):?>
                                                            <span style="background-color:#00cc67;">Confirm</span>
                                                        <?php else:?>
                                                            <span style="background-color:#f91942;">Pending</span>
                                                        <?php endif;?>
                                                    </td>
                                                    <td class="action-btn">
                                                        <i class="far fa-ellipsis-h-alt" style="font-size: 30px;color: #fe5894;"></i>
                                                    </td>
                                                </tr>
                                            <?php endforeach;?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div><!-- End of Table Design -->
                        </div>
                        <div class="prof-fed food feed-container mCustomScrollbar content fluid light" data-mcs-theme="inset-2-dark" style="height: 385px;display: none;">
                            <div class="job-list-tables tbl-container-inventory">
                                <table class="table-custom">
                                    <thead>
                                        <tr>
                                            <th>Ccatering Service</th>
                                            <th>Service Fee</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="resultTables">
                                        <?php if($data['bookedFoodVendor']) : ?>
                                            <?php foreach($data['bookedFoodVendor'] AS $food): ?>
                                                <tr class="table-inventory req_logs_ photog_wrapper" data-uid="<?=$food->vendorId?>" data-name="<?=$food->vendorN?>" data-fee="<?=number_format($food->serviceP)?>.00" data-vt="<?=$food->vType?>">						
                                                    <td class="tittle-id" valign="middle">
                                                        <h3><?=$food->vendorN?></h3>
                                                        <!-- <span>Chemical ID: 20190321341</span> -->
                                                    </td> 
                                                    <td class="item-cat" valign="middle">
                                                        <span id="serviceFee">P<?=number_format($food->serviceP)?>.00</span>	
                                                    </td>
                                                    <!-- pendin #f91942 -->
                                                    <!-- confirm #00cc67 -->
                                                    <td class="status-job booking-status">
                                                        <?php if($food->vendorStatus):?>
                                                            <span style="background-color:#00cc67;">Confirm</span>
                                                        <?php else:?>
                                                            <span style="background-color:#f91942;">Pending</span>
                                                        <?php endif;?>
                                                    </td>
                                                    <td class="action-btn">
                                                        <i class="far fa-ellipsis-h-alt" style="font-size: 30px;color: #fe5894;"></i>
                                                    </td>
                                                </tr>
                                            <?php endforeach;?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div><!-- End of Table Design -->
                        </div>
                        <div class="prof-fed flower feed-container mCustomScrollbar content fluid light" data-mcs-theme="inset-2-dark" style="height: 385px;display: none;">
                            <div class="job-list-tables tbl-container-inventory">
                                <table class="table-custom">
                                    <thead>
                                        <tr>
                                            <th>Flower shop</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="resultTables">
                                        <?php if($data['bookedFlowerVendor']) : ?>
                                            <?php foreach($data['bookedFlowerVendor'] AS $food): ?>
                                                <tr class="table-inventory req_logs_ photog_wrapper" data-uid="<?=$food->vendorId?>" data-name="<?=$food->vendorN?>" data-fee="<?=number_format($food->serviceP)?>.00" data-vt="<?=$food->vType?>">						
                                                    <td class="tittle-id" valign="middle">
                                                        <h3><?=$food->vendorN?></h3>
                                                        <!-- <span>Chemical ID: 20190321341</span> -->
                                                    </td> 
                                                    <td class="item-cat" valign="middle">
                                                        <span id="serviceFee">P<?=number_format($food->serviceP)?>.00</span>	
                                                    </td>
                                                    <!-- pendin #f91942 -->
                                                    <!-- confirm #00cc67 -->
                                                    <td class="status-job booking-status">
                                                        <?php if($food->vendorStatus):?>
                                                            <span style="background-color:#00cc67;">Confirm</span>
                                                        <?php else:?>
                                                            <span style="background-color:#f91942;">Pending</span>
                                                        <?php endif;?>
                                                    </td>
                                                    <td class="action-btn">
                                                        <i class="far fa-ellipsis-h-alt" style="font-size: 30px;color: #fe5894;"></i>
                                                    </td>
                                                </tr>
                                            <?php endforeach;?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div><!-- End of Table Design -->
                        </div>
                    </div>
            </div>
    </section>
</section>
