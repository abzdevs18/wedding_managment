<?php require_once APP_ROOT . '/views/inc/header.php'; ?>
<div id="chemicalAdd" style="height:100vh;width:100%;">
	<section class="offices-msgs" style="margin:0 auto;margin-top:85px;">
		<div class="alerts-notif left-signup" style="width: 50%;background-image:url('<?=URL_ROOT?>/img/default/sign_up.jpg')">
			<div class="alert-content no-fixed-height">
			</div>
		</div>
		<div class="alerts-notif" style="width: 50%;">
			<div class="alert-content no-fixed-height" style="display: flex;flex-direction: column;overflow:hidder;">
				<div id="flash-msgs">
                    <p>Wrong username/password</p>
                </div>
				<div class="content-head signup-p">
					<h2>We'll make your event exciting!!</h2>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Porro quas id ad libero culpa illum, perspiciatis numquam, archi</p>
				</div>
				<form id="signUser">
					<div class="changepass-holder half-row">
						<div style="display:flex;flex-direction:column;width:48%;" class="fSval">
							<div class="form-group err_rep half-form-group" style="width:100%;">
								<input type="text" name="fName" class="form-control">
								<label for="fName">First Name</label>
							</div>
							<label class="invalid-feedback">Error reporting</label>
						</div>
						<div style="display:flex;flex-direction:column;width:48%;" class="lSval">
							<div class="form-group err_rep half-form-group" style="width:100%;">
								<input type="text" name="lName" class="form-control">
								<label for="lName">Last Name</label>
							</div>
							<label class="invalid-feedback">Error reporting</label>
						</div>
					</div>
					<div class="changepass-holder group-control half-row eSval">
						<div class="form-group err_rep">
							<input type="email" name="email" class="form-control">
							<label for="email">Email</label>
						</div>
						<label class="invalid-feedback">Error reporting</label>
					</div>
					<div class="changepass-holder group-control half-row pSval">
						<div class="form-group err_rep">
							<input type="password" id="chemicalFormula" name="password" class="form-control">
							<label for="password">Password</label>
						</div>
						<label class="invalid-feedback">Error reporting</label>
					</div>
					<div class="changepass-holder group-control err_rep half-row cpSval">
						<div class="form-group err_rep">
							<input type="password" id="chemicalFormula" name="cpass" class="form-control">
							<label for="cpass">Confirm Password</label>
						</div>
						<label class="invalid-feedback">Error reporting</label>
					</div>
				</form>
				<div class="prof-container">
					<div class="btn-sign">
						<button class="tg-btn save-btn signupNow" type="button">Signup</button>
						<button class="tg-btn save-btn login" type="button">Login</button>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<?php require_once APP_ROOT . '/views/inc/footer.php'; ?>