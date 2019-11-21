<?php require_once APP_ROOT . '/views/admin/inc/head.php'; ?>

<div class="dash_container">

	<section class="tg-dash">
		<h1>Dashboard</h1>
    </section>
    
	<!-- <section class="main-section mar-30">
		<div class="row" style="height:100vh;padding-bottom:100px;">
            <div id="scheduler_here" class="dhx_cal_container" style='width:100%; height:100%;'>
                <div class="dhx_cal_navline">
                    <div class="dhx_cal_prev_button">&nbsp;</div>
                    <div class="dhx_cal_next_button">&nbsp;</div>
                    <div class="dhx_cal_today_button"></div>
                    <div class="dhx_cal_date"></div>
                    <div class="dhx_minical_icon" id="dhx_minical_icon" onclick="show_minical()">&nbsp;</div>
                    <div class="dhx_cal_tab" name="day_tab" style="right:204px;"></div>
                    <div class="dhx_cal_tab" name="week_tab" style="right:140px;"></div>
                    <div class="dhx_cal_tab" name="month_tab" style="right:76px;"></div>
                </div>
                <div class="dhx_cal_header">
                </div>
                <div class="dhx_cal_data">
                </div>
            </div>
        </div>
    </section> -->
    <section class="main-tbl-container" style="padding: 50px;max-width: 1000px;margin: 40px auto;">
        <div id="calendar" style="padding:50px;"></div>
    </div>
</div>
<?php require_once APP_ROOT . '/views/admin/inc/footer.php'; ?>