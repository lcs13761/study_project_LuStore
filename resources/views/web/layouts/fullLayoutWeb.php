<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="{}" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title></title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link href="/assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="/assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
</head>

<body>
    <!---Nav----->
    <?= $this->insert('web/layouts/navigation'); ?>

    <?= $this->section("content"); ?>

    <!---footer----->
    <?= $this->insert('web/layouts/footer'); ?>

    <!--  Scripts-->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="/assets/js/init-alpine.js"></script>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="/assets/js/materialize.js"></script>
    <script src="/assets/js/init.js"></script>
</body>

</html>