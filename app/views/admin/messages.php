<?php require_once APP_ROOT . '/views/admin/inc/head.php'; ?>

<div class="dash_container">
	<!-- <section class="tg-dash">
		<h1>Administrator Messages</h1>
	</section> -->

	<section class="updates-msgs">
		<div class="msgs-acc">
			<div class="msgs-container">
				<div class="content-head">
					<h2>Messages</h2>
				</div>	
				<div id="msgs-update-3-col">
					<div class="msgs-3-col-item" style="display:none;">
						<div id="search-sort" class="job-search-field">
							<input type="text" name="search" placeholder="Search Here" style="width: 100%;">
							<i class="fal fa-search"></i>
						</div>
						<ul class="jobs-updates">
							<li>Geology Department</li>
							<li>Pharmacy Department</li>
							<li>Chemistry Department</li>
						</ul>
					</div>
					<div class="msgs-3-col-item ad-log">
						<ul class="mCustomScrollbar content fluid light" data-mcs-theme="inset-2-dark" style="height: 525px;width: 100%;">
							<?php if($data['users']):?>
								<?php foreach($data['users'] AS $userM) :?>
								<li style="padding-bottom:0px;margin-bottom:10px;border-bottom:1px solid #888;cursor:pointer;">							
									<!-- <span class="tg-adverified"><i class="fal fa-atom" style="padding-right:5px;"></i> user identification</span> -->
									
									<div class="request_icon_wrapper" style="margin:10px 0px;">
										<?php if($userM->imagePath): ?>
										<div class="req_icon m_notif_icon message_icon">
											<span>K</span>
										</div>
										<?php else :?>
										<div class="req_icon m_notif_icon message_icon">
											<span><?=ucwords($userM->firstN[0])?></span>
										</div>
										<?php endif;?>
										<div style="margin:5px;" class="m_notif_content">										
											<div class="m_tag_time">
												<b><?=ucfirst($userM->firstN) . ' ' . ucfirst($userM->lastN)?></b>
												<span>12:00 am</span>
											</div>
											<h3>EDTA Disodium Salt dihydrate, crystal  </h3>
											<time datetime="2017-08-08">01 Day Ago</time>
										</div>
									</div>									
								</li>
								<?php endforeach;?>
							<?php endif;?>
						</ul>
					</div>
					<div class="msgs-3-col-item" style="width:66.666%;">
						<div class="request_icon_wrapper message_header_chat">
							<?php if($userM->imagePath): ?>
								<div class="req_icon m_notif_icon message_icon" style="margin:8px;">
									<span>K</span>
								</div>
							<?php else :?>
								<div class="req_icon m_notif_icon message_icon" style="margin:8px;">
									<span><?=ucwords($userM->firstN[0])?></span>
								</div>
							<?php endif;?>
							<div class="m_notif_content">										
								<div class="m_tag_time" style="opacity:0;">
									<b>Kate Saycon</b>
								</div>
								<h3><?=ucfirst($userM->firstN) . ' ' . ucfirst($userM->lastN)?></h3>
								<time datetime="2017-08-08">01 Day Ago</time>
							</div>
						</div>

						<div class="message-container" style="flex-direction:column-reverse;">
							<?php if($data['latestM']): ?>
								<?php foreach($data['latestM'] AS $msg): ?>
									<?php if($msg->receiverId == $_SESSION['uId']) : ?>
									<div class="message-reciever">
										<img src="<?=URL_ROOT?>/img/icons/small-prof.jpg" />
										<div class="msg-content">
											<p><?=$msg->msgContent?></p>
											<span><?=$msg->msgDate?></span>
										</div>
									</div>
									<?php else: ?>
									<div class="current-user-sender" style="justify-content: right;">
										<div class="msg-content">
											<p><?=$msg->msgContent?></p>
											<span><?=$msg->msgDate?> <i class="far fa-check"></i></span>
										</div>
										<img src="<?=URL_ROOT?>/img/icons/small-prof.jpg" />
									</div>
									<?php endif;?>
								<?php endforeach;?>
							<?php endif;?>
							<!-- <div class="message-reciever">
								<img src="<?=URL_ROOT?>/img/icons/small-prof.jpg" />
								<div class="msg-content">
									<p>Duis aute irure dolor in reprehenderit .</p>
									<span>Jan. 13, 2019</span>
								</div>
							</div>
							<div class="message-reciever">
								<img src="<?=URL_ROOT?>/img/icons/small-prof.jpg" />
								<div class="msg-content">
									<p>Duis aute irure dolor in reprehenderit in voluptate velit esse
									cillum dolore eu fugiat nulla pariatur.</p>
									<span>Jan. 13, 2019</span>
								</div>
							</div> -->
						</div>
						<div class="input-msgs-content">
							<div class="container-of-msgs">
								<div class="ctl-msg" contenteditable>									
									<label for="typing-msg">Type here your message</label>
								</div>
								<div class="cta-buttons">
									<i class="fal fa-thumbs-up"></i>
									<i class="fal fa-thumbs-down"></i>
									<span>Send</span>
								</div>
							</div>
						</div>
					</div>
				</div>			
			</div>			
		</div>
	</section>

</div>
<?php require_once APP_ROOT . '/views/admin/inc/footer.php'; ?>