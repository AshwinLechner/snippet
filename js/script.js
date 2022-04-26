$(document).ready(function () {
  // function inclCM(text) {
  //   $("#selected").attr("src", `js/codemirror-5.65.2/mode/${text}/${text}.js`);
  // }
  let lang = $("#language option:selected").text().toLowerCase();
  // inclCM(lang);

  let editor;
  editor = CodeMirror.fromTextArea(document.getElementById("editor"), {
    mode: lang,
    theme: "darcula",
    lineNumbers: true,
  });

  $("#language").on("change", function () {
    let code = editor.getValue();
    $(".CodeMirror").remove();
    let lang = $("#language option:selected").text().toLowerCase();

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
