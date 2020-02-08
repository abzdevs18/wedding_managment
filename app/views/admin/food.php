<?php require_once APP_ROOT . '/views/admin/inc/head.php'; ?>

<div class="dash_container">


	<!-- <section class="tg-dash">
		<h1>Chemicals</h1>
	</section> -->
	<section class="main-tbl-container">
		<div class="tbl-wrap">
			<div class="sortby filter-category">
				<div id="sort-drop">
					<span>Sort by:</span>
					<select id="sort-filter" data-sId="3">
						<optgroup>
							<option selected value="1">Recently added</option>
							<option value="2">Service charge</option>
						</optgroup>
					</select>
				</div>
				<div id="search-sort">
                    <div class="actionButtonModal add-btn-top-table" style="margin:0px;">
                        <!-- <button>Deny</button> -->

                        <?php if($_SESSION['is_admin']) : ?>
                        <button class="addVendor" data-ven="food">Add Vendor</button>
                    <?php endif;?>
                        
                    </div>
				</div>
			</div><!-- End of Sorting -->
			
			<div class="job-list-tables tbl-container-inventory">
				<table class="table-custom">
					<thead>
						<tr>
							<th>Catering Service Provider</th>
							<th>Price</th>
							<!-- <th>Floral Image</th> -->
							<th>Actions</th>
						</tr>
					</thead>
					<tbody class="resultTables">
						<?php if($data['food']) : ?>
							<?php foreach($data['food'] AS $food): ?>
								<tr class="table-inventory req_logs_ photog_wrapper" data-uid="<?=$food->vendorId?>" data-name="<?=$food->vendorN?>" data-fee="<?=number_format($food->serviceP)?>.00" data-vt="<?=$food->vType?>">						
									<td class="tittle-id" valign="middle">
										<h3><?=$food->vendorN?></h3>
										<!-- <span>Chemical ID: 20190321341</span> -->
									</td> 
									<td class="item-cat" valign="middle">
										<!-- <span id="serviceFee"><?=$food->serviceP;?></span>	 -->
										<span id="serviceFee">P<?=number_format($food->serviceP)?>.00</span>
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
					</tbody>
				</table>
			</div><!-- End of Table Design -->
		</div>
	</section>
</div>
<?php require_once APP_ROOT . '/views/admin/inc/footer.php'; ?>