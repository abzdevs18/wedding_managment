<?php require_once APP_ROOT . '/views/admin/inc/head.php'; ?>
	<section class="tg-dash">
		<h1>Privacy Settings</h1>
	</section>
	<section class="offices-msgs" style="justify-content:left;">
		<div class="alerts-notif privacy_settings">
			<div class="alert-content no-fixed-height">
				<div class="content-head">
					<h2>Privacy configuration</h2>
				</div>
				<div class="changepass-holder">     
                    <ul>
                        <li class="privacy_items">            
                            <div class="tg-checkbox">
                                <input id="tg-privacysettingstwo" type="checkbox" name="privacy settings" value="yes" checked="">
                                <label for="tg-privacysettingstwo" style="margin-left:30px;">Receive email notification each time some login as ADMIN.</label>
                            </div>
                        </li>
                        <li class="privacy_items">            
                            <div class="tg-checkbox">
                                <input id="tg-privacysettingstwo" type="checkbox" name="privacy settings" value="yes" checked="">
                                <label for="tg-privacysettingstwo" style="margin-left:30px;">I want to receive e-mail alerts about new request</label>
                            </div>
                        </li>
                        <li class="privacy_items">            
                            <div class="tg-checkbox">
                                <input id="tg-privacysettingstwo" type="checkbox" name="privacy settings" value="yes" checked="">
                                <label for="tg-privacysettingstwo" style="margin-left:30px;">I want to receive desktop notifications.</label>
                            </div>
                        </li>
                        <li class="privacy_items">            
                            <div class="tg-checkbox">
                                <input id="tg-privacysettingstwo" type="checkbox" name="privacy settings" value="yes" checked="">
                                <label for="tg-privacysettingstwo" style="margin-left:30px;">Allow messaging feature to Laboratory manager.</label>
                            </div>
                        </li>
                        <li class="privacy_items">            
                            <div class="tg-checkbox">
                                <input id="tg-privacysettingstwo" type="checkbox" name="privacy settings" value="yes" checked="">
                                <label for="tg-privacysettingstwo" style="margin-left:30px;">Allow Laboratory manager to APPROVE CHEMICAL request.</label>
                            </div>
                        </li>
                        <li class="privacy_items">            
                            <div class="tg-checkbox">
                                <input id="tg-privacysettingstwo" type="checkbox" name="privacy settings" value="yes" checked="">
                                <label for="tg-privacysettingstwo" style="margin-left:30px;">Allow Laboratory manager to add STUDENT.</label>
                            </div>
                        </li>
                    </ul>
					<button class="tg-btn" type="button">Save</button>
				</div>
			</div>
		</div>
		<div class="alerts-notif privacy_settings">
			<div class="alert-content no-fixed-height" style="background:rgba(217,83,79,0.10);">
				<div class="content-head">
					<h2 style="color:#a94442;">Delete user</h2>
				</div>
                <form action="" method="POST" id="tinymce">
				<div class="changepass-holder">
					<div class="form-group">
                        <select id="sort-filter">
                            <optgroup>
                                <option selected value="jobs.timestamp">Select user</option>
                                <option value="jobs.salary">Phone</option>
                            </optgroup>
                        </select>
					</div>
					<div class="form-group">
                        <select id="sort-filter">
                            <optgroup>
                                <option selected value="jobs.timestamp">Select reason</option>
                                <option value="jobs.salary">Phone</option>
                            </optgroup>
                        </select>
					</div>
                    <div class="input-msgs-content">
                        <div class="container-of-msgs">
                            <div class="ctl-msg" contenteditable style="background-color:#fff;">									
                                <label for="typing-msg">Description*</label>
                            </div>
                        </div>
                    </div>
					<button class="tg-btn" type="submit" style="margin-top:15px;background:#d9534f;">Delete</button>
				</div>
				</form>
			</div>	
		</div>
	</section>

<?php require_once APP_ROOT . '/views/admin/inc/footer.php'; ?>