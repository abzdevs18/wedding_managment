<?php require_once APP_ROOT . '/views/admin/inc/head.php'; ?>

<div class="dash_container">

	<!-- <section class="tg-dash">
		<h1>Pending Request</h1>
	</section> -->
	<section class="main-tbl-container">
		<div class="tbl-wrap">
			<div class="content-head">
				<h2>Booking Request <sup><i class="fal fa-question-circle" style="font-size:12px;" title="This are the current request sent to the admin."></i></sup></h2>
			</div>
			<div class="filter-category">
				<ul id="job-filters">
					<li class="active-filter" id="filter-all">All <span>(<?=($data['all']) ? ($data['all']) : '0'; ?>)</span></li>
					<li id="filter-pending">Pending <span>(<?=($data['pending']) ? ($data['pending']) : '0'; ?>)</span></li>
					<li id="filter-confirmed">Confirmed <span>(<?=($data['confirm']) ? ($data['confirm']) : '0'; ?>)</span></li>
					<li id="filter-cancelled">Cancelled <span>(<?=($data['cancelled']) ? ($data['cancelled']) : '0'; ?>)</span></li>
					<li id="filter-deleted">Deleted <span>(<?=($data['deleted']) ? ($data['deleted']) : '0'; ?>)</span></li>
				</ul>
			</div><!-- End of filter tabs -->
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
					<input type="text" name="search" placeholder="Search Here">
					<i class="fal fa-search"></i>
				</div>
			</div><!-- End of Sorting -->
			<div class="job-list-tables">
				<table class="table-custom">
					<thead>
						<tr>
							<th>Name</th>
							<th>Event date</th>
							<th>Venue</th>
							<th>Budget</th>
							<th>Status</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody id="filter-job-container" class="table-inventory">
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
										<span class="budgetForWedding"><i class="far fa-ruble-sign"></i> <?=$bookings->budget;?></span>
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
					</tbody>
				</table>
			</div><!-- End of Table Design -->
		</div>
	</section>
</div>
<?php require_once APP_ROOT . '/views/admin/inc/footer.php'; ?>