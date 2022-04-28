$(document).ready(function () {
  $(".pw-btn").click(function () {
    console.log("Hi");
    $(".edit-password").show();
  });
  $(".edit-email").click(function () {
    console.log("Hi");
    $(".email").replaceWith(`   <form action="userpage.php" method="post">
    <input type="email" name="new-email" placeholder="New email" ></input>
    <input type="submit" name="email-change" value="Change">
</form>`);
  });
});
