<section class="main-tbl-container eventDetails" style="height: auto;">
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
            <div class="prof-container" style="position:relative;display: flex;justify-content: right;">
                <div style="height:20px;margin-right: 200px;font-size: 30px;margin-top: 11px;">
                    <!-- <i class="fal fa-envelope"></i> -->
                </div>
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
                            <div class="headEvent" style="display:flex;flex-direction:row;">
                                <div class="bio">
                                    <p class="bio-head">Event information</p>	
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
                                        <div class="bio-d">
                                            <p>Site:</p>
                                            <span class="f-site-link"><?=URL_ROOT . '/frontend/' . $data['eventData']->user_id;?></span>
                                        </div>
                                    </div>					
                                </div>  
                                <div class="datepicker">
                                    <div class="datepicker-header" style="position: relative;">                                        
                                        <div class="counter_text" style="background: #33333363;margin: 0;padding: 25px;border-radius: 5px;padding-top: 0;left: 0;margin-bottom: -10px;">
                                            <span style="font-size: 15px;"><?=date("D. F j Y", strtotime($data['eventData']->forCountDown));?></span>
                                            <p style="font-size: 30px;line-height: 0;">Wedding Day</p>
                                        </div>
                                    </div>
                                </div>                                                                   
                            </div>
                            <div class="bio" style="display:none;">
                                <p class="bio-head">Reception information</p>
                                <div class="bio-d-list" style="height:500px;background:#333;border-radius:5px;">
                                    <h3>Map Here(MAybe)</h3>
                                </div>							
                            </div>					
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
                                                    <td class="action-btn" style="position:relative;">
                                                        <i class="far fa-ellipsis-h-alt" style="font-size: 30px;color: #fe5894;"></i>
                                                        <div class="action-request" style="display:flex;flex-direction:column;position:absolute;top:-20px;">
                                                            <button id="vendorBookConfirm" data-bId="<?=$photographer->venBId?>">Confirm</button>
                                                        </div>
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
                                                    <td class="action-btn" style="position:relative;">
                                                        <i class="far fa-ellipsis-h-alt" style="font-size: 30px;color: #fe5894;"></i>
                                                        <div class="action-request" style="display:flex;flex-direction:column;position:absolute;top:-20px;">
                                                            <button id="vendorBookConfirm" data-bId="<?=$attire->venBId?>">Confirm</button>
                                                        </div>
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
                                            <th>Florist</th>
                                            <th>Flower</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="resultTables">
                                        <?php if($data['bookedFoodVendor']) : ?>
                                            <?php foreach($data['bookedFoodVendor'] AS $food): ?>
                                                <tr class="table-inventory req_logs_ photog_wrapper" data-uid="<?=$food->vendorId?>" data-name="<?=$flower->vendorN?>" data-fee="<?=number_format($flower->serviceP)?>.00" data-vt="<?=$flower->vType?>">						
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
                                                    <td class="action-btn" style="position:relative;">
                                                        <i class="far fa-ellipsis-h-alt" style="font-size: 30px;color: #fe5894;"></i>
                                                        <div class="action-request" style="display:flex;flex-direction:column;position:absolute;top:-20px;">
                                                            <button id="vendorBookConfirm" data-bId="<?=$food->venBId?>">Confirm</button>
                                                        </div>
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
                                                    <td class="action-btn" style="position:relative;">
                                                        <i class="far fa-ellipsis-h-alt" style="font-size: 30px;color: #fe5894;"></i>
                                                        <div class="action-request" style="display:flex;flex-direction:column;position:absolute;top:-20px;">
                                                            <button id="vendorBookConfirm" data-bId="<?=$food->venBId?>">Confirm</button>
                                                        </div>
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