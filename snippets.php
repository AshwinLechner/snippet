<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet/less" type="text/css" href="css/styles.less" />
    <script src="https://cdn.jsdelivr.net/npm/less@4"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="js/script.js" defer></script>
    <script src="js/snippet.js" defer></script>
    <title>Snippet</title>
</head>

<body>

    <div id="container">
        <?php require_once('includes/navbar.php') ?>
        <div id="options-bg">
            <div id="criteria">
                <ul id="search-options">
                    <li>Javascript</li>
                    <li>PHP</li>
                    <li>Python</li>
                    <li>C#</li>
                </ul>
                <div id="extra-options">
                    <select name="options" id="options">
                        <optgroup label="Extra options">
                            <option value="">Newest first</option>
                            <option value="">Oldest first</option>
                            <option value="">A-Z</option>
                            <option value="">Z-A</option>
                        </optgroup>
                    </select>
                </div>
            </div>
        </div>
        <div class="snippet-content">

        </div>
        <div id="demo"></div>
        <?php require_once('includes/footer.php') ?>
    </div>

</body>

</html>