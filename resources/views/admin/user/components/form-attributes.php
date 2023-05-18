<div>
    <div>
        <label for="created_at">Criado em</label>
        <div class="">
            <input id="created_at" placeholder="Criado em" disabled
                class="disabled:pointer-events-none bg-gray-200 block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                type="text" value="<?= $user->created_at ?>">
        </div>
    </div>
    <div class="mt-2">
        <label for="updated_at">Modificado em</label>
        <div class="">
            <input id="updated_at" placeholder="Modificado em" disabled
                class="disabled:pointer-events-none bg-gray-200 block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                type="text" value="<?= $user->updated_at ?>">
        </div>
    </div>

</div>