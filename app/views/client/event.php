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

  <pre id="output"></pre>

  <p id="demo"></p>
  <?=$data['id']?> 
    
        </div>
	</section>
</div>
<?php require_once APP_ROOT . '/views/admin/inc/footer.php'; ?>