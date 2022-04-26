<!-- <script>
function inclCM(text) {
    $('head').append(`<script src="js/codemirror-5.65.2/mode/${text}/${text}.js">
</script>`);
}

</script> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet/less" type="text/css" href="css/styles.less" />
    <script src="https://cdn.jsdelivr.net/npm/less@4"></script>
    <link rel="stylesheet" href="/js/codemirror-5.65.2/lib/codemirror.css">
    <link rel="stylesheet" href="js/codemirror-5.65.2/theme/darcula.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="/js/codemirror-5.65.2/lib/codemirror.js"></script>
    <script src="js/codemirror-5.65.2/mode/javascript/javascript.js"></script>
    <script src="js/codemirror-5.65.2/mode/xml/xml.js"></script>
    <script src="js/codemirror-5.65.2/mode/php/php.js"></script>
    <script src="js/codemirror-5.65.2/mode/css/css.js"></script>
    <script src="js/codemirror-5.65.2/mode/clike/clike.js"></script>
    <script src="js/script.js"></script>
    <!-- <script id="selected" src="" defer></script> -->
    <title>Snippet</title>
</head>

<body>
    <div id="container">

        <?php require_once('includes/navbar.php');
        require_once('includes/snippet-validation.php'); ?>
        <div class="form-container">
            <form id="snippet-form" action="snippet-submit.php" method="POST">
                <label for="title">Title</label>
                <input type="text" name="title">
                <span class="error">* <?php echo $titleErr; ?></span>
                <input type="radio" name="visibility" id="public" value="1" checked="checked">
                <label for="public">Make code public</label>
                <input type="radio" name="visibility" id="private" value="2">
                <label for="private">Keep code private</label>
                <label for="language">Language</label>

                <select name="language" id="language">
                    <?php getLang() ?>
                </select>
                <textarea name="code" id="editor"></textarea>
                <span class="error">* <?php echo $codeErr; ?></span>
                <label for="description">Description</label>
                <textarea name="description" cols="30" rows="10"></textarea>
                <input type="submit" name="submit" value="submit">
            </form>

        </div>
        <?php require_once('includes/footer.php') ?>
    </div>
    </div>


</body>

</html>