$(document).ready(function() {

  $("#re-pass").focus(function() {
    $(this).keyup(function() {
      if ($(this).val() == $("#pass").val()) {
        $(this).addClass("is-valid").removeClass("is-invalid");
        $("#pass").addClass("is-valid").removeClass("is-invalid");
      }
      else {
        $(this).addClass("is-invalid").removeClass("is-valid");
        $("#pass").addClass("is-invalid").removeClass("is-valid");
      }
    });
  });

  $("#re-pass").focusout(function() {
    $(this).removeClass("is-valid is-invalid");
    $("#pass").removeClass("is-valid is-invalid");
  });

});
