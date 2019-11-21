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
					<select id="sort-filter" data-sId="2">
						<optgroup>
							<option selected value="1">Recently added</option>
							<option value="2">Service charge</option>
						</optgroup>
					</select>
				</div>
				<div id="search-sort">
                    <div class="actionButtonModal add-btn-top-table" style="margin:0px;">
                        <!-- <button>Deny</button> -->
                        <button class="addVendor" data-ven="attire">Add Vendor</button>
                    </div>
				</div>
			</div><!-- End of Sorting -->
			
			<div class="job-list-tables tbl-container-inventory">
				<table class="table-custom">
					<thead>
						<tr>
							<th>Name of Beauty Shop</th>
							<th>Price</th>
							<!-- <th>Floral Image</th> -->
							<th>Actions</th>
						</tr>
					</thead>
					<tbody class="resultTables">
						<?php if($data['attire']) : ?>
							<?php foreach($data['attire'] AS $attire): ?>
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
					</tbody>
				</table>
			</div><!-- End of Table Design -->
		</div>
	</section>
</div>
<?php require_once APP_ROOT . '/views/admin/inc/footer.php'; ?>