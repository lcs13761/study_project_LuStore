<?php $this->layout("admin/layouts/contentLayoutAdminMaster"); ?>

<div class="my-6 flex justify-between">
    <h2 class=" text-2xl font-semibold text-gray-700 dark:text-gray-200">
        <?= __('locale.users') ?>
    </h2>
    <a href="<?= url('admin.users.create') ?>"
        class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
        Cadastrar
    </a>
</div>
<!-- New Table -->
<div class="w-full overflow-hidden rounded-lg ">
    <div class="grid grid-cols-3 sm:grid-cols-5 gap-6 rounded mb-6">
        <?php foreach ($users['data'] as $user): ?>
        <article class="flex flex-col items-center px-4 py-8 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div class="w-32 h-32 mb-5 rounded-full bg-gray-800"></div>
            <p class="inline-flex text-gray-400 mt-3">
                <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                    </path>
                </svg>
                <span>USUÁRIO</span>
            </p>
            <h4 class="font-semibold mt-1 dark:text-white">
                <?= $user['full_name'] ?>
            </h4>
            <div class="pt-4 text-center dark:text-white">
                <p class="">
                    <?= $user['email'] ?>
                </p>
                <p>Desde 14/16/14546 as 16h35</p>
            </div>

            <div class="pt-6 inline-flex ">
                <a href="<?= url('admin.users.edit', ['id' => $user['id']]) ?>"
                    class="inline-flex px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-gray-400 border border-transparent rounded-lg active:bg-gray-400 hover:bg-gray-600 focus:outline-none focus:shadow-outline-purple">
                </a>
                <a href="<?= url('admin.users.edit', ['id' => $user['id']]) ?>"
                    class="ml-1 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-400 border border-transparent rounded-lg active:bg-green-400 hover:bg-green-600 focus:outline-none focus:shadow-outline-purple">

                </a>
                <form action="<?= url('admin.users.destroy', ['id' => $user['id']]) ?>" method="post">
                    <input type="hidden" name="_method" value="DELETE" />
                    <button
                        class="ml-1 p-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-500 border border-transparent rounded-lg active:bg-red-500 hover:bg-red-700 focus:outline-none focus:shadow-outline-purple">

                    </button>
                </form>
            </div>
        </article>
        <?php endforeach; ?>
    </div>
    <div
        class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 grid-cols-1 dark:text-gray-400">
        <!-- Pagination -->
        <span class="flex col-span-1 mt-2 sm:mt-auto sm:justify-end">
            <nav aria-label="Table navigation">
                <ul class="inline-flex items-center">
                    <li>
                        <button class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple"
                            aria-label="Previous">
                            <svg aria-hidden="true" class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                <path
                                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                    clip-rule="evenodd" fill-rule="evenodd"></path>
                            </svg>
                        </button>
                    </li>
                    <li>
                        <button
                            class="px-3 py-1 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 rounded-md focus:outline-none focus:shadow-outline-purple">
                            1
                        </button>
                    </li>
                    <li>
                        <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                            2
                        </button>
                    </li>
                    <li>
                        <button class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple"
                            aria-label="Next">
                            <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                <path
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd" fill-rule="evenodd"></path>
                            </svg>
                        </button>
                    </li>
                </ul>
            </nav>
        </span>
    </div>
</div>