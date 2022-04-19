<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet/less" type="text/css" href="css/styles.less" />
    <script src="https://cdn.jsdelivr.net/npm/less@4"></script>
    <title>Contact</title>
</head>

<body>
    <div id="container">
        <?= require_once('includes/navbar.php') ?>
        <div class="contact-content">
            <h1>Conact us</h1>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit quam voluptatem aperiam
                dignissimos nemo omnis reiciendis porro deleniti repudiandae repellendus similique perspiciatis iste
                doloremque autem cumque magni accusantium, nulla distinctio illum totam adipisci est? Voluptates.</p>
        </div>
        <form id="contact-form" action="" method="post">
            <label for="name">Name</label>
            <input type="text" name="name">
            <label for="email">email</label>
            <input type="email" name="email">
            <label for="subject">subject</label>
            <input type="text" name="subject">
            <label for="text">Text</label>
            <textarea name="text" cols="30" rows="10"></textarea>
            <input type="submit" value="Submit">
        </form>
        <?= require_once('includes/footer.php') ?>
    </div>


</body>

</html>