<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= theme("assets/css/styles.css"); ?>">
    <link rel="stylesheet" href="<?= theme2("node_modules/bootstrap/compiler/bootstrap.css"); ?>">
    <link rel="stylesheet" href="<?= theme2("node_modules/bootstrap/compiler/bootstrap-grid.css"); ?>">
    <link rel="stylesheet" href="<?= theme2("node_modules/bootstrap/compiler/bootstrap-utilities.css"); ?>">
    <link rel="stylesheet" href="<?= theme2("node_modules/bootstrap-icons/font/bootstrap-icons.css"); ?>">
    <?= $head;?>
</head>

<body class="bg-cod">


    <div class="offset-sm-4 pt-5 login">
        <div class = "mw-100">
                    <?= $v->section("content"); ?>
        </div>  
    </div>  


    <script src="<?= theme2("node_modules/jquery/dist/jquery.js"); ?>"></script>
    <script src="<?= theme2("node_modules/popper.js/dist/umd/popper.js"); ?>"></script>
    <script src="<?= theme2("node_modules/bootstrap/dist/js/bootstrap.js"); ?>"></script>
    <script src="<?= theme2("node_modules/@popperjs/core/dist/umd/popper.js"); ?>"></script>
    <script src="<?= theme("/assets/js/script.js"); ?>"></script>

</body>

</html>