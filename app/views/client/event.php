<?php require_once APP_ROOT . '/views/admin/inc/head.php'; ?>

<div class="dash_container">
	<!-- <section class="tg-dash">
		<h1>Chemicals</h1>
	</section> -->
  <?php if($data['eventData']) : 
      include('template/eventCountDown.php');
    else : 
      include('template/eventForm.php');
   endif;?>
</div>


<script>
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 8
        });
      }
    </script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC_8v3WbYWBZU47_VZ7DXYZwgiHirVfNnI&callback=initMap"
    async defer></script>
<?php require_once APP_ROOT . '/views/admin/inc/footer.php'; ?>