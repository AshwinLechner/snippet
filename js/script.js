$(document).ready(function () {
  var lang = $("#language option:selected").val();
  var editor = CodeMirror.fromTextArea(document.getElementById("editor"), {
    mode: lang,
    theme: "darcula",
    lineNumbers: true,
  });
  $("#language").on("change", function () {
    if ($("#editor").length) {
    }
  });
});
