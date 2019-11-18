<?php require_once APP_ROOT . '/views/admin/inc/head.php'; ?>

<div class="dash_container">
	<!-- <section class="tg-dash">
		<h1>Chemicals</h1>
	</section> -->
	<section class="main-tbl-container">
		    <div class="tbl-wrap" style="height: 80vh;border: var(--border);background-image:url('<?=URL_ROOT;?>/img/default/event_back.jpg');background-size: cover;background-repeat: no-repeat;background-position: center;">
            <a class="c-btn c-datepicker-btn">
              <span class="material-icon">Open date picker</span>
            </a>
        </div>
        <div class="wrap_time">
          <div class="time_date">
            <h2 id="days_counter">20</h2>
            <p>Days</p>
          </div>
          <div class="time_date">
            <h2 id="hour_counter">04</h2>
            <p>hours</p>
          </div>
          <div class="time_date">
            <h2 id="min_counter">14</h2>
            <p>minutes</p>
          </div>
          <div class="time_date">
            <h2 id="seconds_counter">23</h2>
            <p>seconds</p>
          </div>
        </div>
        <p class="counter_text">Wedding Day</p>
	</section>
</div>
<?php require_once APP_ROOT . '/views/admin/inc/footer.php'; ?>