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
    url: URLL_ROOT + "/admin/vendor",
    type: "POST",
    dataType: "json",
    cache: false,
    processData: false, // important
    contentType: false, // important
    data: fd,
    success: function(data) {
      console.log(fd);
    },
    error: function(err) {
      console.log(err);
    }
  });
  console.log(fd);
});
// $(document).on('click', '.wall-update-btn > button', function(){
// 	  var action = $(this).attr('data-action');
//     var fd = new FormData();
//     var photo_data = $('#wallIMG').prop('files')[0];
//     fd.append('wallPic',photo_data);

// 	if (action == "cancel") {
// 		window.location.href= URL_ROOT + '/dashboard/profile';
// 	}
// 	if (action == "save") {
// 		$.ajax({
// 	      url: URL_ROOT + '/users/wallUpdate',
// 	      type: 'POST',
// 	      dataType: 'json',
// 	      processData: false, // important
// 	      contentType: false, // important
// 	      // data: $.param(sf_site),
// 	      data: fd,
// 	      success: function(data){
// 	      	if (data['status'] == 1) {
// 				window.location.href= URL_ROOT + '/dashboard/profile';
// 	      	}
// 	      },
// 	      error: function(err){
// 	      	console.log(err);
// 	      }
// 	 	});
// 	}
// });
