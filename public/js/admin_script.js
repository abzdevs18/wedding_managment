var URL_ROOT = "";

$(document).on("click", ".clip-path", function() {
  $("#side-navigation").toggleClass("sideNav-full");
  $("#menus-nav li a").toggleClass("hide-sh");
  $("#logo-icon").toggleClass("logo-show");
  $(".adm-prof").toggleClass("logo-show");
  if ($("#side-navigation").hasClass("sideNav-full")) {
    $(".caret-right").hide(100);
    $(".caret-left").show(300);
  } else {
    $(".caret-left").hide(100);
    $(".caret-right").show(300);
  }
});
$(document).ready(function() {
  $("#side-navigation").scroll(function() {
    $("html, body").animate(
      {
        scrollTop: $("#myDiv").offset().top
      },
      2000
    );
  });
});
// $(document).on("click", ".ctl-msg", function() {
//   $(".ctl-msg label").hide();
//   $(this).focusout(function(e) {
//     console.log($(this).text().length);
//   });
// });

$(document).on("click", "#menus-nav > li", function() {
  var link = $(this).attr("data-link");
  window.location.href = link;
  $("#menus-nav li").removeClass("menu-active");
  $(this).addClass("menu-active");
  console.log(link);
});
/* All job*/
$(document).on("click", "#filter-all", function() {
  $("#job-filters li").removeAttr("class");
  $(this).addClass("active-filter");
  $.ajax({
    url: URL_ROOT + "/admin/getAll",
    success: function(data) {
      $("#filter-job-container").html(data);
    }
  });
});
/* All pending book*/
$(document).on("click", "#filter-pending", function() {
  $("#job-filters li").removeAttr("class");
  $(this).addClass("active-filter");
  $.ajax({
    url: URL_ROOT + "/admin/getPending",
    success: function(data) {
      $("#filter-job-container").html(data);
    }
  });
});
/* All confirmed book*/
$(document).on("click", "#filter-confirmed", function() {
  $("#job-filters li").removeAttr("class");
  $(this).addClass("active-filter");
  $.ajax({
    url: URL_ROOT + "/admin/getConfirmed",
    success: function(data) {
      $("#filter-job-container").html(data);
    }
  });
});
/* All cancelled book*/
$(document).on("click", "#filter-cancelled", function() {
  $("#job-filters li").removeAttr("class");
  $(this).addClass("active-filter");
  $.ajax({
    url: URL_ROOT + "/admin/getCancelled",
    success: function(data) {
      $("#filter-job-container").html(data);
    }
  });
});
/* All deleted book*/
$(document).on("click", "#filter-deleted", function() {
  $("#job-filters li").removeAttr("class");
  $(this).addClass("active-filter");
  $.ajax({
    url: URL_ROOT + "/admin/getDeleted",
    success: function(data) {
      $("#filter-job-container").html(data);
    }
  });
});
/* Search query */
$(document).on("keyup", "#search-sort > input", function() {
  var query = $(this).val();
  if (query != "") {
    $.ajax({
      url: URL_ROOT + "/admin/getJobTitle/" + query,
      type: "POST",
      // dataType: 'json',
      success: function(data) {
        if (data) {
          $("#filter-job-container").html(data);
        } else {
          $("#filter-job-container").html(
            "<tr class='n-res'><td colspan='9' style='text-align:center;'>No result!!</td></tr>"
          );
        }
      },
      error: function(err) {
        console.log(err);
      }
    });
  } else {
    $.ajax({
      url: URL_ROOT + "/admin/getAllJob",
      type: "POST",
      // dataType: 'json',
      success: function(data) {
        $("#filter-job-container").html(data);
      },
      error: function(err) {
        console.log(err);
      }
    });
  }
});
/* Open Job filter*/
$(document).on("change", "#sort-filter", function() {
  var filter = $(this).val();
  $.ajax({
    url: URL_ROOT + "/admin/getJobDropDown/" + filter,
    success: function(data) {
      $("#filter-job-container").html(data);
      console.log(data);
    }
  });
});

$("#admin-search-field").keyup(function() {
  if ($(this).val() != "") {
    $(".dash-result").slideDown(100);
  } else {
    $(".dash-result").slideUp(100);
  }
});
