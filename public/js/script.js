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
  } else if (vendorType == "attire") {
    $(".confirmationMessage h2").text("Adding artist to record.");
    $(".actionButtonModal button:first-child").attr("data-serviceType", 2);
  } else if (vendorType == "food") {
    $(".confirmationMessage h2").text("Adding Catering services to record.");
    $(".actionButtonModal button:first-child").attr("data-serviceType", 3);
  } else if (vendorType == "flower") {
    $(".confirmationMessage h2").text("Adding Flower shop to record.");
    $(".actionButtonModal button:first-child").attr("data-serviceType", 4);
  }
  $("body").css({
    overflow: "hidden",
    position: "relative"
  });
  $(".actionButtonModal button:first-child").attr("id", "vendorSave");
  $(".actionButtonModal button:last-child").attr("id", "closeClient");
});
$(document).on("click", "#closeClient", function() {
  venderRecordAdding("photographer");
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
    url: URLL_ROOT + "/Admin/vendor",
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
        // $(".confirmationModal").hide(10);
        // window.location.href = URLL_ROOT + "/admin/photographer";
        if (serviceType == 1) {
          venderRecordAdding("photographer");
        } else if (serviceType == 2) {
          venderRecordAdding("attire");
        } else if (serviceType == 3) {
          venderRecordAdding("food");
        } else if (serviceType == 4) {
          venderRecordAdding("flower");
        }
      }
      console.log(data);
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
  var vendorType = $(this).attr("data-vt");

  //  else {
  $(".m_icon_req").attr("data-uid", vendor_id);
  $("#hireVendor").attr("data-vendorId", vendor_id);
  $(".m_icon_req").attr("data-vt", vendorType);
  $(".request_side").attr("data-status", "open");
  $(".request_side").css("right", "0");
  $(".m_head_req").text(vendor_name);
  $("#fees").text(vendor_fee);
  $(".m_icon_req span").text(vendor_name.charAt(0));
  // }
  if (vendorType == 1) {
    $("#vendorType").text("Photographer");
  } else if (vendorType == 2) {
    $("#vendorType").text("Beauty Shop");
  } else if (vendorType == 3) {
    $("#vendorType").text("Food & Catering Services");
  } else if (vendorType == 4) {
    $("#vendorType").text("Flower Shop");
  }
});

$(document).on("click", ".m_icon_req", function() {
  $(".slideModal").show(100);
  $(".slideM button").attr("data-type", $(this).attr("data-vt"));
  var uid = $(".m_icon_req").attr("data-uid");

  $.ajax({
    url: URLL_ROOT + "/Admin/getSamples",
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
$(document).on("click", ".slideM button", function() {
  var serviceType = $(this).attr("data-type");
  if (serviceType == 1) {
    venderRecordAdding("photographer");
  } else if (serviceType == 2) {
    venderRecordAdding("attire");
  } else if (serviceType == 3) {
    venderRecordAdding("food");
  } else if (serviceType == 4) {
    venderRecordAdding("flower");
  }
});
// $(document).on("click", "#closeClient", function() {
//   // $(".slideModal").hide(100);
//   window.location.href = URLL_ROOT + "/admin/photographer";
// });

$(document).on("click", "#venCloser", function() {
  var stat = $(".request_side").attr("data-status");
  if (stat == "open") {
    $(".request_side").attr("data-status", "");
    $(".request_side").css("right", "-33%");
  }
});

// Using the function below close the modal slider and adding of vendor
function venderRecordAdding(photographer) {
  window.location.href = URLL_ROOT + "/Admin/" + photographer;
}

// hire vendor
$(document).on("click", "#hireVendor", function() {
  var vendorId = $(this).attr("data-vendorId");
  $.ajax({
    url: URLL_ROOT + "/Admin/hireVendor",
    type: "POST",
    data: {
      vendorId: vendorId
    },
    dataType: "json",
    success: function(data) {
      if (data["status"] == 2) {
        if (confirm("Delete booked with the vendor?")) {
          $.ajax({
            url: URLL_ROOT + "/Admin/deleteVendor",
            type: "POST",
            data: {
              vendorId: vendorId
            },
            success: function(data) {
              window.location.href = URLL_ROOT + "/Admin/event";
            },
            error: function() {}
          });
        }
      }
    },
    error: function(err) {}
  });
});
// This is for the sorting process

$(document).on("change", "#sort-filter", function() {
  var serviceId = $(this).attr("data-sId");
  var sortVal = $(this).val();

  if (sortVal == 1) {
    $.ajax({
      url: URLL_ROOT + "/Admin/getSorted",
      type: "POST",
      data: {
        serviceId: serviceId,
        sortVal: sortVal
      },
      success: function(data) {
        $(".resultTables").html(data);
        console.log(data);
      },
      error: function(err) {
        console.log(err);
      }
    });
  } else if (sortVal == 2) {
    $.ajax({
      url: URLL_ROOT + "/Admin/getSorted",
      type: "POST",
      data: {
        serviceId: serviceId,
        sortVal: sortVal
      },
      success: function(data) {
        $(".resultTables").html(data);
        console.log(data);
      },
      error: function(err) {
        console.log(err);
      }
    });
  }
});
// Loading messages and go to bottom
$(document).on("click", "#clientM", function() {
  var uid = $(this).attr("data-uid");
  $("#messageSendingButton").attr("data-uid", uid);
  $.ajax({
    url: URLL_ROOT + "/Admin/getMsgClick",
    type: "POST",
    data: {
      clientId: uid
    },
    success: function(data) {
      $("#rightMessages").html(data);
      //For scrollBar
      // $(".messaging").mCustomScrollbar({
      //   autoHideScrollbar: true,
      //   setTop: "-100%"
      // });
      (function($) {
        $(window).on("load", function() {
          $(".messaging").mCustomScrollbar("scrollTo", "bottom", {
            autoHideScrollbar: true,
            scrollInertia: 3000
          });
        });
      })(jQuery);
      // console.log(data);
    },
    error: function(err) {
      console.log(err);
    }
  });
});
// sending message
$(document).on("click", "#messageSendingButton", function() {
  var uid = $(this).attr("data-uid");
  var sId = $(this).attr("data-sId");
  var msgCon = $(".msgCon").text();

  $.ajax({
    url: URLL_ROOT + "/Admin/setMessage",
    type: "POST",
    data: {
      clientId: uid,
      sessionId: sId,
      msgContent: msgCon
    },
    dataType: "json",
    success: function(data) {
      // console.log(data);
      if (data["status"]) {
        $(".msgCon").text("");
        $(".container-of-msgs label").show(10);

        $.ajax({
          url: URLL_ROOT + "/Admin/getMsgClick",
          type: "POST",
          data: {
            clientId: uid
          },
          success: function(data) {
            $("#rightMessages").html(data);
            //For scrollBar
            (function($) {
              $(".messaging").mCustomScrollbar("scrollTo", "bottom", {
                autoHideScrollbar: true
              });
            })(jQuery);
            // console.log(data);
          },
          error: function(err) {
            console.log(err);
          }
        });
        console.log("ssss");
      } else {
        console.log("saaw");
      }
    },
    error: function(err) {
      console.log(err);
    }
  });
});
$(document).on("keyup", ".msgCon", function() {
  var msgCon = $(this).text();
  if (msgCon != "") {
    $(".container-of-msgs label").hide(10);
  } else {
    $(".container-of-msgs label").show(10);
  }
});
// realtime Messaging
// setInterval(function() {
//   var uid = $("#messageSendingButton").attr("data-uid");
//   var sid = $("#messageSendingButton").attr("data-sid");
//   $.ajax({
//     url: URL_ROOT + "/admin/realtimeMsg",
//     type: "POST",
//     data: {
//       uid: uid,
//       sid: sid
//     },
//     success: function(data) {
//       $(".messaging").html(data);
//     }
//   });
// }, 3000);

// Event Adding
$(document).on("click", ".addEvent", function() {
  var eventData = $("#eventForm").serializeArray();

  $.ajax({
    url: URL_ROOT + "/Admin/addEvent",
    type: "POST",
    data: $.param(eventData),
    success: function(data) {
      if (data) {
        window.location.href = URLL_ROOT + "/admin/event";
      }
    },
    error: function(err) {
      console.log(err);
    }
  });
});

// Book Event
$(document).on("click", ".bookEvent", function() {
  var eventId = $(this).attr("data-eId");

  $.ajax({
    url: URL_ROOT + "/Admin/bookEvent",
    type: "POST",
    data: {
      eventId: eventId
    },
    dataType: "json",
    success: function(data) {
      if (data["status"] == 1) {
        $(".bookEvent").text("Pending Request");
        $(".bookEvent").css("background-color", "#f91942");
      } else if (data["status"] == 2) {
        if (confirm("Cancel booking request?")) {
          $.ajax({
            url: URL_ROOT + "/Admin/deleteBookEvent",
            type: "POST",
            data: {
              eventId: eventId
            },
            success: function(data) {
              alert("Booking request is cancelled!");
              window.location.href = URLL_ROOT + "/Admin/event";
            },
            error: function(err) {}
          });
        }
      } else {
        alert("Something went wrong!!!" + data);
      }
      console.log(data);
    },
    error: function(err) {
      console.log(err);
    }
  });
});

//Confirm Book event
$(document).on("click", "#confirmBook", function() {
  var bookingId = $(this).attr("data-bId");
  $.ajax({
    url: URL_ROOT + "/Admin/confirmBookEvent",
    type: "POST",
    data: {
      bookingId: bookingId
    },
    success: function(data) {
      if (data) {
        alert("Yeeahh");
      }
    },
    error: function(err) {}
  });
});

// Check details of client Event
$(document).on("click", ".bookingD", function() {
  var eventId = $(this).attr("data-bId");
  $.ajax({
    url: URL_ROOT + "/Admin/clientEventDetails",
    type: "POST",
    data: {
      eventId: eventId
    },
    success: function(data) {
      $(".dash_container").html(data);
    },
    error: function(err) {}
  });
});
// Check details of client Event
$(document).on("click", "#vendorBookConfirm", function() {
  var eventId = $(this).attr("data-bId");
  $.ajax({
    url: URL_ROOT + "/Admin/confirmBookingVendor",
    type: "POST",
    data: {
      eventId: eventId
    },
    success: function(data) {
      alert("Confirmed!!");
    },
    error: function(err) {}
  });
});
