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
					<select id="sort-filter">
						<optgroup>
							<option selected value="jobs.timestamp">Most Recent</option>
							<option value="jobs.salary">Job Salary</option>
						</optgroup>
					</select>
				</div>
				<div id="search-sort">
                    <div class="actionButtonModal add-btn-top-table">
                        <!-- <button>Deny</button> -->
                        <button id="cancelDeletion">Add Vendor</button>
                    </div>
				</div>
			</div><!-- End of Sorting -->
			
			<div class="job-list-tables tbl-container-inventory">
				<table class="table-custom">
					<thead>
						<tr>
							<th>Florist</th>
							<th>Flower</th>
							<!-- <th>Floral Image</th> -->
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php for($i = 0; $i < 5; $i++) : ?>
						<tr class="table-inventory req_logs_">						
							<td class="tittle-id" valign="middle">
								<h3>Ammonium Sulphate  AR Grade  </h3>
								<!-- <span>Chemical ID: 20190321341</span> -->
							</td> 
							<td class="item-cat" valign="middle">
								<span>(NH<sub>4</sub>)2SO<sub>3</sub></span>	
							</td>
							<!-- <td class="item-cat">
								<span>77.08</span>	
							</td> -->
							<td class="action-btn">
								<i class="far fa-ellipsis-h-alt" style="font-size: 30px;color: #fe5894;"></i>
							</td>
						</tr>
						<?php endfor; ?>
					</tbody>
				</table>
			</div><!-- End of Table Design -->
		</div>
	</section>
</div>
<?php require_once APP_ROOT . '/views/admin/inc/footer.php'; ?>