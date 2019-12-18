<?php require_once APP_ROOT . '/views/inc/header.php'; ?>
<div id="chemicalAdd" style="height:100vh;width:100%;">
	<section class="offices-msgs" style="margin:0 auto;margin-top:85px;">
		<div class="alerts-notif left-signup" style="width: 50%;background-image:url('<?=URL_ROOT?>/img/default/sign_up.jpg')">
			<div class="alert-content no-fixed-height">
			</div>
		</div>
		<div class="alerts-notif" style="width: 50%;">
            <div class="alert-content no-fixed-height" style="display: flex;flex-direction: column;">
                <div id="flash-msgs">
                    <p>Wrong username/password</p>
                </div>
                <div class="content-head signup-p">
                    <h2>We are glad you came back!!!</h2>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Porro quas id ad libero culpa illum, perspiciatis numquam, archi</p>
                </div>
                <form class="loginCredentials">
                    <div class="changepass-holder half-row">
                        <div class="form-group">
                            <input type="text" value="root" name="adminUserName" class="form-control s">
                            <label for="adminUserName">Email</label>
                        </div>
                    </div>
                    <div class="changepass-holder half-row">
                        <div class="form-group">
                            <input type="password" value="AbuevZ091095?" name="adminUserPass" class="form-control">
                            <label for="adminUserPass">Password</label>
                        </div>
                    </div>
                </form>
				<div class="prof-container">
					<div class="btn-sign">
						<button class="tg-btn save-btn login-p-btn">Login</button>
						<button class="tg-btn save-btn sign-p-btn">Signup</button>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<?php require_once APP_ROOT . '/views/inc/footer.php'; ?>