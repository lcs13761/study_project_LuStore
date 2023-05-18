<?php

namespace App\Services\Admin\User;

use App\Models\User;

class UserService
{
    private $data;

    public function __construct(private User $user)
    {
    }

    public function all()
    {
        return $this->user->all();
    }

    public function find($id)
    {
        return $this->user->find($id);
    }

    /**
     * Summary of create
     * @param mixed $data
     * @return void
     */
    public function create(array $data)
    {
        $this->data = $data;

        $this->user->create($this->getData());
    }

    /**
     * Summary of update
     * @param mixed $user
     * @param mixed $data
     * @return void
     */
    public function update($user, $data)
    {
        $this->data = $data;

        $user->update($this->getData());
    }

    /**
     * Summary of getData
     * @return array
     */
    private function getData(): array
    {
        $data = [
            'first_name' => $this->get('first_name'),
            'last_name' => $this->get('last_name'),
            'email' => $this->get('email'),
        ];

        if ($this->get('password')) {
            $data['password'] = password_hash($this->get('password'), PASSWORD_DEFAULT);
        }

        return $data;
    }


    private function get($value)
    {
        return $this->data[$value] ?? null;
    }

    /**
     * Summary of delete
     * @param mixed $user
     * @return void
     */
    public function delete($user)
    {
        $user->destroy();
    }

}