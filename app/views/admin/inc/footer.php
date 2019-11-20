	</main>	
	<div id="action_options" class="m_add_hidden">
		<a href="<?=URL_ROOT;?>/admin/add_user_ad"><i class="far fa-user-shield"></i> Add User</a>
		<a href="<?=URL_ROOT;?>/admin/add_student"><i class="far fa-user-tag"></i> Add Student</a>
	</div>
  <a class="c-btn c-datepicker-btn">
    <span class="material-icon">Open date picker</span>
  </a>

  <pre id="output"></pre>

  <p id="demo"></p>
  <?=$data['id']?>
	<!-- <div id="add_record">
		<p><i class="far fa-plus"></i></p>
	</div> -->
	<!-- <div id="sound"></div> -->
	<script src="<?=URL_ROOT;?>/js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="<?=URL_ROOT;?>/js/push.min.js"></script>
	<script src="<?=URL_ROOT;?>/js/main.js"></script>
	<script src="<?=URL_ROOT;?>/js/admin_script.js"></script>
	<!-- <script src="https://cdn.tiny.cloud/1/hhu3aczt7p034dcjnizjwnns5faj5u4s14e894midesztea0/tinymce/5/tinymce.min.js"></script>  -->

	<!-- For Countdown -->
	<script src="https://unpkg.com/babel-polyfill@6.2.0/dist/polyfill.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/rome/2.1.22/rome.standalone.js"></script>
  <script src="<?=URL_ROOT;?>/js/datePicker/material-datetime-picker.js" charset="utf-8"></script>

  <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
	<script src="<?=URL_ROOT;?>/js/script.js"></script>
  <!-- <script type="text/javascript">
    $(document).ready(function(){
      $('.sampleModal').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        arrows: false,
        autoplaySpeed: 1000,
      });
    });
  </script> -->

<script>

    var picker = new MaterialDatetimePicker({})
      .on('submit', function(d) {
        output.innerText = d;
        setDate(d);
      });

    var el = document.querySelector('.c-datepicker-btn');
    el.addEventListener('click', function() {
      picker.open();
    }, false);

</script>

<script>
  function setDate(date){
      // Set the date we're counting down to
      var countDownDate = new Date(date).getTime();

      // Update the count down every 1 second
      var x = setInterval(function() {

        // Get today's date and time
        var now = new Date().getTime();
          
        // Find the distance between now and the count down date
        var distance = countDownDate - now;
          
        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
          
        // Output the result in an element with id="demo"
        // document.getElementById("demo").innerHTML = days + "d " + hours + "h "
        // + minutes + "m " + seconds + "s ";
        document.getElementById("days_counter").innerHTML = days;
        document.getElementById("hour_counter").innerHTML = hours;
        document.getElementById("min_counter").innerHTML = minutes;
        document.getElementById("seconds_counter").innerHTML = seconds;
        // If the count down is over, write some text 
        if (distance < 0) {
          clearInterval(x);
          document.getElementById("demo").innerHTML = "EXPIRED";
        }
      }, 1000);
  }
</script>
</body>
</html>