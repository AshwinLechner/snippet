$(document).ready(function () {
  let editor;
  let lang = $("#language option:selected").text().toLowerCase();
  editor = CodeMirror.fromTextArea(document.getElementById("editor"), {
    mode: lang,
    theme: "darcula",
    lineNumbers: true,
  });

  $("#language").on("change", function () {
    let code = editor.getValue();
    $(".CodeMirror").remove();
    lang = $("#language option:selected").text().toLowerCase();

    if (lang === "html") {
      lang = "xml";
    }

    editor = CodeMirror.fromTextArea(document.getElementById("editor"), {
      mode: lang,
      theme: "darcula",
      lineNumbers: true,
    });
    editor.setValue(code);
  });
});
