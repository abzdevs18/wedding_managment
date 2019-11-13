<?php require_once APP_ROOT . '/views/admin/inc/head.php'; ?>


	<!-- <section class="tg-dash">
		<h1>Student Listing</h1>
	</section> -->
	<section class="main-tbl-container">
		<div class="tbl-wrap">
			<div class="content-head">
				<h2>Registered Students<?php print_r($data['one']);?></h2>
			</div>
			<div class="sortby filter-category">
				<div id="sort-drop">
					<span>Sort by:</span>
					<select>
						<optgroup>
							<option selected>Geology Department</option>
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
							<th>Emp Photo</th>
							<th>Job Tittle</th>
							<th>Category</th>
							<th>Price & Location</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<!-- if job is close add row with class name "sold" -->
						<?php foreach($data['job'] AS $job) : ?>
						<tr>
							<td style="text-align: center;">
								<input type="checkbox" name="">
							</td>
							<td>
								<img src="assets/img/icons/img-06.jpg">
							</td>
							<td class="tittle-id">
								<h3><?=$job->jTitle;?></h3>
								<span>Ad ID: <?=$job->jId;?></span>
							</td>
							<td class="item-cat">
								<span>Laptops & PCs</span>	
							</td>
							<td class="price-loc">								
								<h3>P <?=$job->jSalary;?></h3>
								<span><?=$job->comLoc;?></span>
							</td>
							<td class="action-btn">
								<span class="eye" data-jId="<?=$job->jId;?>"><i class="fal fa-eye"></i></span>
								<span class="trash" data-jId="<?=$job->jId;?>"><i class="fal fa-trash"></i></span>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div><!-- End of Table Design -->
		</div>
	</section>

<?php require_once APP_ROOT . '/views/admin/inc/footer.php'; ?>