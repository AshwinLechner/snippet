// let xmlhttp = new XMLHttpRequest();
// xmlhttp.onload = function () {
//   const myObj = JSON.parse(this.responseText);
//   console.log(myObj);
//   let text = "";
//   for (let x in myObj) {
//     text += myObj[x].author + "<br>";
//   }
//   document.getElementById("snippet-content").innerHTML = text;
// };
// xmlhttp.open("GET", "includes/snippet-db.php");
// xmlhttp.send();
// $.get("includes/snippet-db.php", function (data) {
//   console.log(typeof data);
//   //   alert("Data Loaded: " + jQuery.parseJSON(data));
// });

// 2;
// 3;
// $(document).ready(function () {
//   $.getJSON("includes/snippet-db.php", function (json) {
//     let snippet = JSON.stringify(json);
//     let text = "";
//     for (let x in snippet) {
//       text += snippet.title + "<br>";
//     }
//     // document.getElementById("snippet-content").innerHTML = text;
//     console.log(text);
//   });
// });
$(document).ready(function () {
  $.ajax({
    url: "includes/snippet-db.php",
    type: "get",
    dataType: "JSON",
    success: function (response) {
      let len = response.length;
      for (let i = 0; i < len; i++) {
        let snippet = ` <div class="snippet"> <div class="title-date">
        <div class="title"> ${response[i].title}</div>
        <div class="date">${response[i].date}</div>
    </div>
    <div class="code">
        <pre>
            <code>
                ${response[i].code}
            </code>
        </pre>
    </div> 
    `;
        if (response[i].description) {
          snippet += `<div class="description">
            <p>Description:   ${response[i].description}</p>
        </div>`;
        }
        snippet += `</div>`;
        $("#snippets").append(snippet);
      }
    },
  });
});
