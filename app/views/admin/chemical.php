<?php require_once APP_ROOT . '/views/admin/inc/head.php'; ?>


	<!-- <section class="tg-dash">
		<h1>Chemicals</h1>
	</section> -->
	<section class="main-tbl-container">
		<div class="tbl-wrap">
			<div class="content-head">
				<h2>Chemicals</h2>
			</div>
			<!-- <div class="filter-category">
				<ul id="job-filters">
					<li class="active-filter">All Chemicals <span>(10)</span></li>
					<li>Payment Cat_1 <span>(10)</span></li>
					<li>Payment Cat_2 <span>(10)</span></li>
					<li>Payment Cat_3 <span>(10)</span></li>
				</ul>
			</div> -->
			<div class="sortby filter-category">
				<div id="sort-drop">
					<span>Sort by:</span>
					<select>
						<optgroup>
							<option selected>HIMEDIA</option>
							<option>Most Recent</option>
							<option>Most Recent</option>
							<option>Most Recent</option>
						</optgroup>
					</select>
				</div>
				<div id="search-sort">
					<input type="text" name="search" placeholder="Search Here">
					<i class="fal fa-search"></i>
				</div>
			</div><!-- End of Sorting -->
			<div class="job-list-tables">
				<table>
					<thead>
						<tr>
							<th><input type="checkbox" name=""></th>
							<th>Job Tittle</th>
							<th>Category</th>
							<th>Featured</th>
							<th>Job Status</th>
							<th>Price & Location</th>
							<th>Due Date</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($data['job'] AS $job) : ?>
						<tr>
							<td style="text-align: center;">
								<input type="checkbox" name="">
							</td>
							<td class="tittle-id">
								<h3><?=$job->jTitle;?></h3>
								<span>Ad ID: <?=$job->jId;?></span>
							</td>
							<td class="item-cat">
								<span>Laptops & PCs</span>	
							</td>
							<td>
								<span>Yes</span>
							</td>
							<td class="status-job">
								<span>Active</span>
							</td>
							<td class="price-loc">								
								<h3>P <?=$job->jSalary;?></h3>
								<span><?=$job->comLoc;?></span>
							</td>
							<td class="date-pub">								
								<h4 style="margin-bottom: 10px;"><?=$job->jDeadline;?></h4>
								<span>Published</span>
							</td>
							<td class="action-btn">
								<span class="eye"><i class="fal fa-eye"></i></span>
								<span class="trash"><i class="fal fa-trash"></i></span>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div><!-- End of Table Design -->
		</div>
	</section>

<?php require_once APP_ROOT . '/views/admin/inc/footer.php'; ?>