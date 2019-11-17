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
					<li class="active-filter" id="filter-all">All <span>(10)</span></li>
					<li id="filter-featured">Pending <span>(10)</span></li>
					<li id="filter-open">Confirmed <span>(10)</span></li>
					<li>Cancelled <span>(10)</span></li>
					<li>Deleted <span>(10)</span></li>
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
						<?php for($i = 0; $i < 5; $i++) : ?>
						<tr class="req_logs_">
							
							<td>
								<div class="request_icon_wrapper">
									<div class="req_icon">
										<span>IV</span>
									</div>
									<div style="margin:5px;margin-top:0px;">
										<h3>Clint Anthony Abueva</h3>
										<time datetime="2017-08-08">Client ID: <span>20193124</span></time>
									</div>
								</div>
							</td>
							<td class="tittle-id">
								<h3 style="color:orange;">05.15.2020</h3>
							</td>
							<td class="tittle-id">
								<h3>Dumaguete</h3>
							</td>
							<td>
								<span class="budgetForWedding"><i class="far fa-ruble-sign"></i> 200,000.00</span>
							</td>
							<td class="status-job booking-status">
								<span>Pending</span>
							</td>
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