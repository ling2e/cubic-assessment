<?php
// import Global Components
include_once $_SERVER["DOCUMENT_ROOT"] . "/components/Button.php";

if (!isset($title)) $title = "Number Collector";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        <?= include_once $_SERVER["DOCUMENT_ROOT"] . "/views/_template.css" ?>
    </style>
    <script src="https://cdn.tailwindcss.com"></script>
    <title><?= $title ?></title>

    <?= function_exists("head") ? call_user_func("head") :  "" ?>

</head>

<body>
    <div id="main">
        <?=
        /*
            Function with name "content" will be the page content to show.

            if func content exists will return the page with content,
            if func content not exists will return NotFoundPage.
        */
        function_exists("content") ? call_user_func("content") :  header('Location: /');
        ?>
    </div>
</body>

</html>