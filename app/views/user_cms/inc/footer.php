
  <script src="https://unpkg.com/babel-polyfill@6.2.0/dist/polyfill.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/rome/2.1.22/rome.standalone.js"></script>
  <script src="<?=URL_ROOT;?>/js/datePicker/material-datetime-picker.js" charset="utf-8"></script>

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
        document.getElementById("demo").innerHTML = days + "d " + hours + "h "
        + minutes + "m " + seconds + "s ";
          
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