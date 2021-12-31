<?php

namespace Source\App\Admin;
use Pecee\Controllers\IResourceController;
use Source\Core\Controller;
use Source\Models\Auth;
use Source\Models\User;
use Source\Request\Admin\UserRequest;
use Source\Support\Event;
use Source\Support\File;

class AdminController extends Controller implements IResourceController
{


    /**
     * @return mixed
     */
    public function index()
    {
       $users = (new User())->where('level','5' , ">=")->fetch(true);
       return $this->view->render('admin/user/index',compact('users'));
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        // TODO: Implement show() method.
    }

    /**
     * @return mixed
     */
    public function create()
    {
       return $this->view->render('admin/user/form');
    }

    /**
     * @return mixed
     */
    public function store()
    {
        $request = new UserRequest();
        if (!$request->validation()) redirect(url_back());
        if($request->photo) {
            $verify = $this->file->save($request->photo);
            $request->photo = $verify;
        }
        $create = [
            "photo" => $request->photo,
            "name" => $request->name,
            "email" => $request->email,
            "password" => passwd($request->password),
            "level" => "5",
            "email_verified" => tokenEmailVerification($request->email)
        ];
        $user = User::create($create);
        (new Event())->registered($user);
        redirect(url('user.index'));
    }

    /**
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        $user = (new User())->where('id',$id)->andWhere('level' , '5',">=")->fetch();
        return $this->view->render('admin/user/form',compact('user'));
    }

    /**
     * @param $id
     * @return mixed
     */
    public function update($id)
    {
        $request = new UserRequest();
        if (!$request->validation()) redirect(url_back());
        $user = User::find($id);
        if($request->photo) {
            $verify = $this->file->save($request->photo);
            $request->photo = $verify;
        }
        var_dump($request->all());
        $user->update($request->all());
        redirect(url('user.index'));
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {

        try {
            if(Auth::auth()->level != 6){
                return response()->json(["status" => "error",'error' => 'Você não possui permisão necessaria para excluir outro administrador.'],500);
            }
            $user = User::find($id);
            if($user->photo)(new File())->destroy($user->photo);
            $user->destroy();
            return response()->json(["status" => 'success']);
        } catch (\Exception $e){
            return response()->json(["status" => "error","error" => $e->getMessage()],500);
        }


    }
}