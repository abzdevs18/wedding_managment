<?php require_once APP_ROOT . '/views/admin/inc/head.php'; ?>


<div class="dash_container">

	<!-- <section class="tg-dash">
		<h1>Update Settings</h1>
	</section> -->
	<section class="offices-msgs">
		<div class="alerts-notif" style="width:66.666%;box-shadow: var(--box-shadow);padding:0px;">
			<div class="alert-content no-fixed-height">
				<div class="content-head">
					<h2>Profile Details</h2>
				</div>
				<div class="changepass-holder">
					<div style="width:200px;height:200px;background:red;margin-bottom: 25px;border-radius: 5px;background-size: cover;background-position: center;box-shadow: var(--box-shadow);">

					</div>
					<div class="form-group">
						<input type="file" name="profilePic" placeholder="Username" class="form-control">
					</div>
					<div class="changepass-holder half-row" style="padding-left:1px;padding-right:0px;">
						<div class="form-group half-form-group">
							<select style="width: 100%;" name="gender">
								<optgroup>
									<?php foreach ($data['brand'] as $brand) : ?>
										<option value="<?=$brand->id;?>"><?=$brand->name;?></option>
									<?php endforeach; ?>
								</optgroup>
							</select>
							<label for="gender">Gender</label>
						</div>
						<div class="form-group half-form-group">
							<input type="text" name="username" placeholder="Username" class="form-control">
						</div>
					</div>
					<div class="changepass-holder half-row" style="padding-left:1px;padding-right:0px;">
						<div class="form-group half-form-group">
							<input type="text" name="fname" placeholder="First name" class="form-control" value="<?=$data['userData']->firstname;?>">
						</div>
						<div class="form-group half-form-group">
							<input type="text" name="lname" placeholder="Last Name*" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<input type="email" name="email" placeholder="Email Address" class="form-control">
					</div>
					<button class="tg-btn" type="button">Update Now</button>
				</div>
			</div>
		</div>
		<div class="alerts-notif" style="display:none;">
			<div class="alert-content no-fixed-height">
				<div class="content-head">
					<h2>Change Password</h2>
				</div>
				<div class="changepass-holder">
					<div class="form-group">
						<input type="password" name="password" placeholder="Current Password" class="form-control">
					</div>
					<div class="form-group">
						<input type="password" name="password" placeholder="Current Password" class="form-control">
					</div>
					<div class="form-group">
						<input type="password" name="password" placeholder="Current Password" class="form-control">
					</div>
					<button class="tg-btn" type="button">Change Now</button>
				</div>
				
			</div>	
		</div>
	</section>
</div>
<?php require_once APP_ROOT . '/views/admin/inc/footer.php'; ?>