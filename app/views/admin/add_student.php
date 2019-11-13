<?php require_once APP_ROOT . '/views/admin/inc/head.php'; ?>

	<section class="tg-dash">
		<h1>Student</h1>
	</section>
	<form id="chemicalAdd">
	<section class="offices-msgs">
		<div class="alerts-notif" style="width: 66.66%;">
			<div class="alert-content no-fixed-height" style="display: flex;flex-direction: column;border:1px solid #d5d5d5;">
				<div class="content-head" style="margin-bottom:10px;">
					<h2>Student Details</h2>
				</div>
				<div class="changepass-holder half-row">
					<div class="form-group half-form-group">
						<input type="text" name="chemWt" class="form-control">
						<label for="chemWt">Firstname</label>
					</div>
					<div class="form-group half-form-group">
						<input type="text" name="chemAssay" class="form-control">
						<label for="chemAssay">Student No.</label>
					</div>
				</div>
				<div class="changepass-holder third-row">
					<div class="form-group half-form-group">
						<input type="date" name="chemExpiration" class="form-control">
						<label for="chemExpiration">Birth date</label>
					</div>
					<div class="form-group half-form-group">
						<select style="width: 100%;" name="chemBrand">
							<optgroup>
								<?php foreach ($data['brand'] as $brand) : ?>
									<option value="<?=$brand->id;?>"><?=$brand->name;?></option>
								<?php endforeach; ?>
							</optgroup>
						</select>
						<label for="chemBrand">Department</label>
					</div>
					<div class="form-group half-form-group">
						<select style="width: 100%;" name="chemBrand">
							<optgroup>
								<?php foreach ($data['brand'] as $brand) : ?>
									<option value="<?=$brand->id;?>"><?=$brand->name;?></option>
								<?php endforeach; ?>
							</optgroup>
						</select>
						<label for="chemBrand">Gender</label>
					</div>
				</div>
				<div class="prof-container">
					<div>
						<button class="tg-btn save-btn" type="button">Save</button>
					</div>
				</div>
			</div>
		</div>
	</section>
</form>
<?php require_once APP_ROOT . '/views/admin/inc/footer.php'; ?>