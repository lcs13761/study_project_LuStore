<div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
    <div>
        <label for="first_name">Nome</label>
        <div class="">
            <input id="first_name" placeholder="Nome" name="first_name"
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                type="text" value="<?= $user->first_name ?>">
        </div>
    </div>
    <div>
        <label for="last_name">Sobrenome</label>
        <div class="">
            <input id="last_name" placeholder="Sobrenome" name="last_name"
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                type="text" value="<?= $user->last_name ?>">
        </div>
    </div>
    <div>
        <label for="email">E-mail</label>
        <div class="">
            <input id="email" placeholder="E-mail" name="email"
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                type="email" value="<?= $user->email ?>">
        </div>
    </div>
    <div>
        <label for="password">Senha</label>
        <div class="">
            <input id="password" placeholder="Senha" name="password"
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                type="password">
        </div>
    </div>
    <div>
        <label for="password_confirmetion">Confirmar senha</label>
        <div class="">
            <input id="password_confirmetion" placeholder="Confirmar senha" name="password_confirmetion"
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                type="password">
        </div>
    </div>
</div>