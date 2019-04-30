
$(function () {

$("#rate").click(function () {

      $("#qty, #rate").on("keydown keyup", mul);

      function mul() {
      $("#amount").val(Number($("#qty").val()) * Number($("#rate").val()));
      }


});
});
