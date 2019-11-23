/* FIeld form design*/

//For scrollBar
$(".content").mCustomScrollbar({
  autoHideScrollbar: true
});
//For scrollBar
(function($) {
  $(window).on("load", function() {
    $(".messaging").mCustomScrollbar("scrollTo", "bottom", {
      autoHideScrollbar: true,
      scrollInertia: 3000
    });
  });
})(jQuery);
/*ENd ScrollBar*/
var URL_ROOT = "/wedding_cms";

$(document).on("click", ".setup-btn", function() {
  var form = $(this).attr("data-form");
  var link = $(this).attr("data-link");
  /* Admin configuration Script*/
  var current, next, prev;

  current = $(this).parent();
  next = $(this)
    .parent()
    .next();

  if (form == 1) {
    /* progress */
    $(".progress li")
      .eq($("div.awesome").index(next))
      .addClass("active");
    current.hide();
    next.show();
    animate(current, next);
  }

  if (form == 2) {
    var dbCon = $("#c-n").serializeArray();
    /* Check for the inputs if they are valid */
    $.ajax({
      url: URL_ROOT + "/init/adminSetup",
      type: "POST",
      dataType: "json",
      data: $.param(dbCon),
      success: function(data) {
        /* If inputs are valid show connecting to the DB */
        if (data["status"] == 1) {
          $(".modal")
            .show(100)
            .animate({ opacity: "1" }, 300);
          $(".loadingTxt").text("Connecting to database");
          $(".loading")
            .show(100)
            .animate({ opacity: "1", "margin-right": "25%" }, 800);
          $.ajax({
            url: URL_ROOT + "/init/configGen",
            type: "POST",
            dataType: "json",
            data: $.param(dbCon),
            success: function(data) {
              if (data["status"] == 1) {
                $.ajax({
                  url: URL_ROOT + "/init/err",
                  type: "POST",
                  dataType: "json",
                  success: function(data) {
                    /* If this goes wrong error will throw up*/
                    if (data["error"] == 0) {
                      $.ajax({
                        url: URL_ROOT + "/init/uploadTable",
                        dataType: "json",
                        beforeSend: function() {
                          setTimeout(function() {
                            $(".loadingTxt").text("Uploading Tables");
                          }, 5000);
                        },
                        success: function(data) {
                          /* Checking SQL upload status*/
                          setTimeout(function() {
                            if (data["error"] == 0) {
                              $(".modal").hide(100);
                              $(".loading").hide();
                              $(".error").hide();
                              /* progress */
                              $(".progress li")
                                .eq($("div.awesome").index(next))
                                .addClass("active");
                              current.hide();
                              next.show();
                              animate(current, next);
                            } else {
                              $(".loading")
                                .animate(
                                  { opacity: "0", "margin-right": "50%" },
                                  300
                                )
                                .hide(50);
                              $(".error")
                                .delay(130)
                                .animate(
                                  { opacity: "1", "margin-right": "25%" },
                                  800
                                );
                            }
                          }, 5000);
                        }
                      });
                    } else {
                      $(".loading")
                        .animate({ opacity: "0", "margin-right": "50%" }, 300)
                        .hide(50);
                      $(".error")
                        .delay(130)
                        .animate({ opacity: "1", "margin-right": "25%" }, 800);
                    }
                  },
                  error: function(e) {
                    console.log(e);
                  }
                });
              } else {
                $(".loading")
                  .animate({ opacity: "0", "margin-right": "50%" }, 300)
                  .hide(50);
                $(".error")
                  .delay(130)
                  .animate({ opacity: "1", "margin-right": "25%" }, 800);
              }
            }
          });
        } else {
          if (data["DB_HOST_err"]) {
            /* Get the parent/container of the input field for firstname and */
            feedbackShow("dbVal", data["DB_HOST_err"]);
          } else {
            feedbackHide("dbVal");
          }

          if (data["DB_NAME_err"]) {
            /* Get the parent/container of the input field for firstname and */
            feedbackShow("hostVal", data["DB_NAME_err"]);
          } else {
            feedbackHide("hostVal");
          }

          if (data["DB_USER_err"]) {
            /* Get the parent/container of the input field for firstname and */
            feedbackShow("userVal", data["DB_USER_err"]);
          } else {
            feedbackHide("userVal");
          }
        }
      },
      error: function(e) {
        console.log(e);
      }
    });
    // $('.progress li').eq($('div.awesome').index(next)).addClass('active');

    // current.hide();
    // next.show();
    // animate(current, next);
  }

  if (form == 3) {
    var ch_site = $("#sf_site_info").serializeArray();
    var fd = new FormData();
    var photo_data = $("#imgInp").prop("files")[0];
    var siteName = $("input[name=siteName").val();
    var adminEmail = $("input[name=adminEmail").val();
    var adminUserName = $("input[name=adminUserName").val();
    var adminUserPass = $("input[name=adminUserPass").val();
    var adminUserCPass = $("input[name=adminUserCPass").val();
    fd.append("siteLogo", photo_data);
    fd.append("siteName", siteName);
    fd.append("adminEmail", adminEmail);
    fd.append("adminUserName", adminUserName);
    fd.append("adminUserPass", adminUserPass);
    fd.append("adminUserCPass", adminUserCPass);

    $.ajax({
      url: URL_ROOT + "/init/chSetup",
      type: "POST",
      dataType: "json",
      processData: false, // important
      contentType: false, // important
      // data: $.param(ch_site),
      data: fd,
      success: function(data) {
        if (data["status"] == 1) {
          $("body").css("overflow", "hidden");
          $(".modal")
            .show(100)
            .animate({ opacity: "1" }, 300);
          $(".finish").animate({ opacity: "1", "margin-right": "25%" }, 800);
        } else {
          if (data["siteName_err"]) {
            /* Get the parent/container of the input field for firstname and */
            feedbackShow("siteVal", data["siteName_err"]);
          } else {
            feedbackHide("siteVal");
          }

          if (data["adminEmail_err"]) {
            /* Get the parent/container of the input field for firstname and */
            feedbackShow("adminEmailVal", data["adminEmail_err"]);
          } else {
            feedbackHide("adminEmailVal");
          }

          if (data["adminUserName_err"]) {
            /* Get the parent/container of the input field for firstname and */
            feedbackShow("adminUserVal", data["adminUserName_err"]);
          } else {
            feedbackHide("adminUserVal");
          }

          if (data["adminUserPass_err"]) {
            /* Get the parent/container of the input field for firstname and */
            feedbackShow("adminPassVal", data["adminUserPass_err"]);
          } else {
            feedbackHide("adminPassVal");
          }

          if (data["adminUserCPass_err"]) {
            /* Get the parent/container of the input field for firstname and */
            feedbackShow("adminCPassVal", data["adminUserCPass_err"]);
          } else {
            feedbackHide("adminCPassVal");
          }
        }
      },
      error: function(e) {
        console.log(e);
      }
    });
  }

  /* if setup this is the link*/
  if (link == "login") {
    window.location.href = URL_ROOT + "/admin/login";
  }
});
/* Admin initialization*/
$(document).on("click", ".error > span", function() {
  $(".error").animate({ opacity: "0", "margin-right": "50%" }, 800);
  $(".modal")
    .delay(500)
    .animate({ opacity: "0" }, 300)
    .hide(100);
});

$(document).on("click", ".login-admin", function() {
  login();
});

$(document).on("click", ".login-p-btn", function() {
  login();
});
$(".loginCredentials").keypress(function(e) {
  if (e.keyCode == 13) {
    login();
  }
});
function login() {
  var adminData = $(".loginCredentials").serializeArray();

  $.ajax({
    url: URL_ROOT + "/init/adminLogin",
    type: "POST",
    dataType: "json",
    data: $.param(adminData),
    success: function(data) {
      if (data["data"].status == 1 && data["row"].fId != "") {
        feedbackDefault("f-form");
        window.location.href = URL_ROOT + "/admin";
        console.log(data["row"].fId);
      } else if (data["data"].status == 2) {
        $("#flash-msgs")
          .show()
          .effect("shake", { times: 4 }, 1000);
      } else {
        if (data["data"].adminUserName_err) {
          /* Get the parent/container of the input field for firstname and */
          feedbackShow("adminUVal", data["data"].adminUserName_err);
        } else {
          feedbackHide("adminUVal");
        }

        if (data["data"].adminUserPass_err) {
          /* Get the parent/container of the input field for firstname and */
          feedbackShow("adminPVal", data["data"].adminUserPass_err);
        } else {
          feedbackHide("adminPVal");
        }
      }
      // console.log(data);
    },
    error: function(err) {
      console.log(err);
    }
  });
}

$(document).on("click", ".signupNow", function() {
  var clientData = $("#signUser").serializeArray();

  $.ajax({
    url: URL_ROOT + "/init/clientSignup",
    type: "POST",
    dataType: "json",
    data: $.param(clientData),
    success: function(data) {
      if (data["status"]) {
        $("#flash-msgs").show(100);
        $("#flash-msgs").css("border-color", "#00cc67");
        $("#flash-msgs p").css({
          background: "#00cc670f",
          color: "#00cc67"
        });
        $("#flash-msgs p").text("Registration successful!!");

        setTimeout(function() {
          window.location.href = URL_ROOT + "/pages/login";
        }, 4000);
      } else {
        if (data["fName_err"]) {
          /* Get the parent/container of the input field for firstname and */
          feedbackShow("fSval", data["fName_err"]);
        } else {
          feedbackHide("fSval");
        }

        if (data["lName_err"]) {
          /* Get the parent/container of the input field for firstname and */
          feedbackShow("lSval", data["lName_err"]);
        } else {
          feedbackHide("lSval");
        }

        if (data["email_err"]) {
          /* Get the parent/container of the input field for firstname and */
          feedbackShow("eSval", data["email_err"]);
        } else {
          feedbackHide("eSval");
        }

        if (data["password_err"]) {
          /* Get the parent/container of the input field for firstname and */
          feedbackShow("pSval", data["password_err"]);
        } else {
          feedbackHide("pSval");
        }

        if (data["cpass_err"]) {
          /* Get the parent/container of the input field for firstname and */
          feedbackShow("cpSval", data["cpass_err"]);
        } else {
          feedbackHide("cpSval");
        }
      }
    },
    error: function(err) {
      console.log(err);
    }
  });
});
function animate(current, next) {
  var left, opacity, scale;
  current.animate(
    { opacity: 0 },
    {
      step: function(now, _mx) {
        scale = 1 - (1 - now) * 0.2;
        left = now * 50 + "%";
        opacity = 1 - now;
        current.css({ transform: "scale(" + scale + ")" });
        next.css({ left: left, opacity: opacity });
      },
      duration: 800,
      complete: function() {
        current.hide();
      }
    }
  );
}

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $("#blah").attr("src", e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
  }
}

$("#imgInp").change(function() {
  $("#blah").show(100);
  readURL(this);
});

/*This two function below will show and hide the feedback during the validation process*/
function feedbackDefault(container) {
  $("." + container + " .form-group > input").removeClass("invalid-box-shadow");
  $("." + container + " .invalid-feedback").hide();
}

function feedbackShow(container, data) {
  $("." + container + " .form-group > input").addClass("invalid-box-shadow");
  $("." + container + " .invalid-feedback")
    .show()
    .text(data);
}

function feedbackHide(container) {
  $("." + container + " .form-group > input").removeClass();
  $("." + container + " .invalid-feedback").hide();
}

$(window).scroll(function() {
  var w = $(window).scrollTop();
  var e = $(".dashboard-nav").offset().top;
  var t = e - w;
  if (t < -100) {
    console.log("Now");
    // $(".dashboard-nav").css("position","fixed");
  }
});
$(document).on("click", "#notif-icon", function() {
  $(".m_notification").toggleClass("m_notif_show");
});

// Calendar of Events Script
document.addEventListener("DOMContentLoaded", function() {
  var calendarEl = document.getElementById("calendar");

  var calendar = new FullCalendar.Calendar(calendarEl, {
    plugins: ["interaction", "dayGrid", "timeGrid", "dayGridPlugin"],
    timeZone: "local",
    locale: "us",
    defaultView: "dayGridMonth",
    header: {
      left: "prev,next today",
      center: "title",
      right: "dayGridMonth,timeGridWeek,timeGridDay"
    },
    events: URL_ROOT + "/admin/loadEvent",
    selectable: true,
    selectHelper: true,
    select: function(info) {
      var title = prompt("Enter Event Title");
      if (title) {
        $.ajax({
          url: URL_ROOT + "/admin/inserEvent",
          type: "POST",
          data: { title: title, start: info.startStr, end: info.endStr },
          success: function() {
            calendar.refetchEvents();
          }
        });
      }
      console.log(info.start);
    },
    editable: true,
    eventResize: function(info) {
      $.ajax({
        url: URL_ROOT + "/admin/updateTimeEvent",
        type: "POST",
        data: {
          id: info.event.id,
          start: calendar.formatIso(info.event.start),
          end: calendar.formatIso(info.event.end)
        },
        success: function(data) {
          calendar.refetchEvents();
          // alert(data);
        },
        error: function(err) {
          // alert(err);
        }
      });
    },
    eventDrop: function(info) {
      $.ajax({
        url: URL_ROOT + "/admin/updateTimeEvent",
        type: "POST",
        data: {
          id: info.event.id,
          start: calendar.formatIso(info.event.start),
          end: calendar.formatIso(info.event.end)
        },
        success: function(data) {
          calendar.refetchEvents();
          // alert(data);
        },
        error: function(err) {
          // alert(err);
        }
      });
    },
    eventClick: function(info) {
      if (confirm("Delete this event?")) {
        $.ajax({
          url: URL_ROOT + "/admin/deleteEvent",
          type: "POST",
          data: {
            id: info.event.id
          },
          success: function(data) {
            calendar.refetchEvents();
            // alert(data);
          },
          error: function(err) {
            // alert(err);
          }
        });
      }
    }
  });
  calendar.render();
});
// Signup
$(document).on("click", ".login", function() {
  window.location.href = URL_ROOT + "/pages/login";
});
$(document).on("click", ".sign-p-btn", function() {
  window.location.href = URL_ROOT + "/pages/signup";
});
