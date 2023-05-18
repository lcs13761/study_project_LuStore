<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Windmill Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="/css/app.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />

</head>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        <!---Sidebar----->
        <?= $this->insert('admin/layouts/sidebarNavigation'); ?>

        <div class="flex flex-col flex-1 w-full">
            <!----Topbar---->
            <?= $this->insert('admin/layouts/topbarLayout'); ?>

            <!----Conteúdo---->
            <main class="h-full overflow-y-auto">
                <div class="container px-6 mx-auto grid">
                    <?= $this->section("content"); ?>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="/assets/js/init-alpine.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>
    <!-- <script src="/assets/js/charts-lines.js" defer></script>
    <script src="/assets/js/charts-pie.js" defer></script> -->
</body>

</html>