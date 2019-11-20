// $(document).on('click','#check-couple', function(e){
//     e.preventDefault();
//     $('.confirmationModal').show(100);
// });
var URLL_ROOT = "/wedding_cms";
// Delete Blog
$(document).on("click", ".addVendor", function() {
  var vendorType = $(this).attr("data-ven");
  $(".confirmationModal").show(10);
  if (vendorType == "photog") {
    $(".confirmationMessage h2").text("Adding photographer to record.");
    $(".actionButtonModal button:first-child").attr("data-serviceType", 1);
  }
  $("body").css({
    overflow: "hidden",
    position: "relative"
  });
  $(".actionButtonModal button:first-child").attr("id", "vendorSave");
  $(".actionButtonModal button:last-child").attr("id", "closeClient");
});
$(document).on("click", "#closeClient", function() {
  //   window.location.href = URL_ROOT;
  $(".confirmationModal").hide(10);
  $("body").css({
    overflow: "auto",
    position: "relative"
  });
});

$(document).on("click", "#vendorSave", function() {
  var progress = $(".blog_update_progress_percent");

  var serviceType = $(this).attr("data-serviceType");
  var name = $("#vendorName").val();
  var fee = $("#vendorFee").val();
  var fd = new FormData();
  // var photo_data = $("#sampleVendors").prop("files")[0];
  var sd = document.getElementById("sampleVendors").files.length;
  for (var x = 0; x < sd; x++) {
    fd.append("files[]", document.getElementById("sampleVendors").files[x]);
  }
  fd.append("name", name);
  fd.append("fee", fee);
  fd.append("serviceType", serviceType);
  $.ajax({
    xhr: function() {
      var xhr = new window.XMLHttpRequest();

      xhr.upload.addEventListener(
        "progress",
        function(evt) {
          if (evt.lengthComputable) {
            var percentComplete = evt.loaded / evt.total;
            percentComplete = parseInt(percentComplete * 100);

            console.log(percentComplete);

            var percentCom = percentComplete + "%";
            progress.width(percentCom);
            // $("#statusText").text(percentCom);
            if (percentComplete === 60) {
              $("#blog_update_progress").css("color", "#fff");
            }
          }
        },
        false
      );

      return xhr;
    },
    url: URLL_ROOT + "/admin/vendor",
    type: "POST",
    dataType: "json",
    cache: false,
    processData: false, // important
    contentType: false, // important
    data: fd,
    beforeSend: function() {
      $(".updatingSign").show();
    },
    success: function(data) {
      if (data["status"]) {
        $(".confirmationModal").hide(10);
        window.location.href = URLL_ROOT + "/admin/photographer";
      }
      // console.log(fd);
    },
    error: function(err) {
      console.log(err);
    }
  });
  // console.log(fd);
});
$(function() {
  // Multiple images preview in browser
  function read(input, container) {
    // function read(){
    if (input.files) {
      var filesAmount = input.files.length;

      for (i = 0; i < filesAmount; i++) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $($.parseHTML("<div class='grid-item'>"))
            .attr(
              "style",
              "background-image: url(" +
                e.target.result +
                "), linear-gradient(rgba(0,0,0,-0.5),rgba(0,0,0,0.5));background-size: cover;height:115px;"
            )
            .appendTo(container);
        };

        reader.readAsDataURL(input.files[i]);
      }
    }
  }

  $("#sampleVendors").on("change", function() {
    $(".previewSampleImages").show(100);
    read(this, "div.grid-container");
  });
});
$(document).on("click", ".photog_wrapper", function() {
  var vendor_name = $(this).attr("data-name");
  var vendor_fee = $(this).attr("data-fee");
  var vendor_id = $(this).attr("data-uid");

  //  else {
  $(".m_icon_req").attr("data-uid", vendor_id);
  $(".request_side").attr("data-status", "open");
  $(".request_side").css("right", "0");
  $(".m_head_req").text(vendor_name);
  $("#fees").text(vendor_fee);
  $("#vendorType").text("Photographer");
  $(".m_icon_req span").text(vendor_name.charAt(0));
  // }
});

$(document).on("click", "#venCloser", function() {
  var stat = $(".request_side").attr("data-status");
  if (stat == "open") {
    $(".request_side").attr("data-status", "");
    $(".request_side").css("right", "-33%");
  }
});

$(document).on("click", ".m_icon_req", function() {
  $(".slideModal").show(100);
  var uid = $(".m_icon_req").attr("data-uid");
  $.ajax({
    url: URLL_ROOT + "/admin/getSamples",
    type: "POST",
    data: {
      uid: uid
    },
    success: function(data) {
      $(".sampleModal").html(data);
      $(".sampleModal").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        arrows: false,
        autoplaySpeed: 1000
      });

      // console.log(data);
    },
    error: function(err) {
      console.log(err);
    }
  });
  console.log(uid);
});

$(document).on("click", ".slideM", function() {
  // $(".slideModal").hide(100);
  window.location.href = URLL_ROOT + "/admin/photographer";
});
