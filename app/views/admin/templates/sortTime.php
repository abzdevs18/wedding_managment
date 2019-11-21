
<?php if($data['data']) : ?>
    <?php foreach($data['data'] AS $attire): ?>
        <tr class="table-inventory req_logs_ photog_wrapper" data-uid="<?=$attire->vendorId?>" data-name="<?=$attire->vendorN?>" data-fee="<?=number_format($attire->serviceP)?>.00" data-vt="<?=$attire->vType?>">						
            <td class="tittle-id" valign="middle">
                <h3><?=$attire->vendorN?></h3>
                <!-- <span>Chemical ID: 20190321341</span> -->
            </td> 
            <td class="item-cat" valign="middle">
                <span id="serviceFee">P<?=number_format($attire->serviceP)?>.00</span>	
            </td>
            <!-- <td class="item-cat">
                <span>77.08</span>	
            </td> -->
            <td class="action-btn">
                <i class="far fa-ellipsis-h-alt" style="font-size: 30px;color: #fe5894;"></i>
            </td>
        </tr>
    <?php endforeach;?>
<?php endif; ?>