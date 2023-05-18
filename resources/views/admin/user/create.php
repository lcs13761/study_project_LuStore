<?php $this->layout("admin/layouts/contentLayoutAdminMaster"); ?>

<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Users|Create</h2>

<form method="post" action="<?= url('admin.users.store') ?>">
    <div class="grid grid-cols-1 sm:grid-cols-1 xl:grid-cols-6 2xl:grid-cols-4 gap-6 text-gray-700 dark:text-gray-200">
        <div
            class="p-6 col-span-4 sm:col-span-3 xl:col-span-4 2xl:col-span-3 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <?= $this->insert('admin/user/components/form', ['user' => $user]) ?>
        </div>
        <div
            class="p-6 bg-white rounded-lg shadow-md dark:bg-gray-800 col-span-4 sm:col-span-3 xl:col-span-2 2xl:col-span-1">
            <?= $this->insert('admin/user/components/form-attributes', ['user' => $user]) ?>
        </div>
    </div>

    <!-- botões -->
    <div class="flex flex-wrap gap-4 justify-start mt-4">
        <div class="col-12">

            <!-- salvar -->
            <button
                class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Salva
            </button>

            <a href="<?= url('admin.users.index') ?>"
                class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Cancelar
            </a>
        </div>
    </div>
</form>