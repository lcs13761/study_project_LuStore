<?php declare(strict_types=1);

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Resource\User\UserCollection;
use App\Http\Resource\User\UserResource;
use App\Models\User;
use App\Services\Admin\User\UserService;
use Pecee\Controllers\IResourceController;

class UserController extends Controller implements IResourceController
{
    private UserService $userService;

    public function __construct()
    {
        $this->userService = new UserService(new User());
    }

    public function index()
    {
        return view('admin.user.index', [
            'users' => (new UserCollection($this->userService->all()))->toArray()
        ]);
    }

    public function create()
    {
        return view('admin.user.create', [
            'user' => new User
        ]);
    }

    public function store()
    {
        $this->userService->create(input()->all());

        return redirect('/admin/users');
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        return view('admin.user.edit', [
            'user' => new UserResource($this->userService->find($id)),
        ]);
    }

    public function update($id)
    {
        $user = $this->userService->find($id);

        $this->userService->update($user, input()->all());

        return redirect('/admin/users');
    }

    public function destroy($id)
    {
        $user = $this->userService->find($id);

        $this->userService->delete($user);

        return redirect('/admin/users');
    }

}