<?php

namespace App\Models;

use App\Supports\Model\Model as Model;

class User extends Model
{
    protected string $table = 'users';

    /**
     * @return string
     */
    public function fullName(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }


    // /**
    //  * @return bool
    //  */
    // public function save(): bool
    // {
    //     if (!$this->required()) {
    //         $this->message->warning("Nome, sobrenome, email e senha são obrigatórios");
    //         return false;
    //     }

    //     if (!is_email($this->email)) {
    //         $this->message->warning("O e-mail informado não tem um formato válido");
    //         return false;
    //     }

    //     if (!is_passwd($this->password)) {
    //         $min = CONF_PASSWD_MIN_LEN;
    //         $max = CONF_PASSWD_MAX_LEN;
    //         $this->message->warning("A senha deve ter entre {$min} e {$max} caracteres");
    //         return false;
    //     } else {
    //         $this->password = passwd($this->password);
    //     }

    //     /** User Update */
    //     if (!empty($this->id)) {
    //         $userId = $this->id;

    //         if ($this->find("email = :e AND id != :i", "e={$this->email}&i={$userId}", "id")->fetch()) {
    //             $this->message->warning("O e-mail informado já está cadastrado");
    //             return false;
    //         }

    //         $this->update($this->safe(), "id = :id", "id={$userId}");
    //         if ($this->fail()) {
    //             $this->message->error("Erro ao atualizar, verifique os dados");
    //             return false;
    //         }
    //     }

    //     /** User Create */
    //     if (empty($this->id)) {
    //         if ($this->findByEmail($this->email, "id")) {
    //             $this->message->warning("O e-mail informado já está cadastrado");
    //             return false;
    //         }

    //         $userId = $this->create($this->safe());
    //         if ($this->fail()) {
    //             $this->message->error("Erro ao cadastrar, verifique os dados");
    //             return false;
    //         }
    //     }

    //     $this->data = ($this->findById($userId))->data();
    //     return true;
    // }
}