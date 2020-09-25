$(document).ready(function() {

  $('.status').each(function() {
    switch ($(this).html()) {
      case 'approved':
        $(this).addClass("table-success").removeClass("status");
        break;
      case 'rejected':
        $(this).addClass("table-danger").removeClass("status");
        break;
    }
  });

  $('#startDate').change(function() {
    $('#endDate').attr("min",$(this).val());
  });

});
