// var jsonData = JSON.parse("<?= addslashes($snippets); ?>");
// console.log(jsonData);
var xmlhttp = new XMLHttpRequest();
xmlhttp.onload = function () {
  const myObj = JSON.parse(this.responseText);
  console.log(myObj);
  let text = "";
  for (let x in myObj) {
    text += myObj[x].author + "<br>";
  }
  document.getElementById("snippet-content").innerHTML = text;
};
xmlhttp.open("GET", "includes/snippet-db.php");
xmlhttp.send();
