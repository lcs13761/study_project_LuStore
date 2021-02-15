<?php 


namespace Source\Model;

use Source\Core\Session;
use Source\Core\Model;
use Source\Core\Upload;

class User extends Model 
{
    protected static $entity = "imagemUsuario";

    public function __construct()
    {
        parent::__construct("imagemUsuario", "id");
    }

    public function findUser(string $columns = "*", ?string $terms = null, ?string $params = null)
    {
        $terms = " WHERE {$terms}";
        $params = $params;


        return parent::find($terms, $params, $columns);
    }

    public function insertImagem(array $image)
    {
        $id = $_SESSION['authUser'];      
        $auth = (new Upload());
        $terms = [];
        $nameImagem = $auth->update($image);
        array_push($terms, "imagem","idusuario");
        array_push($nameImagem , $id);
        $terms = implode(",", $terms);
        $params = "'" .  implode("','", $nameImagem) . "'";
        parent::insert($terms,$params);
    }

    public function updateImagem(array $image,int $id)
    {
        $imgName = (new User())->findUser("imagem" , "idusuario = " , "'{$id}'")->fetch(true);
        $updateImage = new Upload();
        $deletefile = $updateImage->deleteImagem($imgName);

        if ($deletefile) {
            $newImage = $updateImage->update($image);
            $newImage = implode("", $newImage);
            $terms = "imagem = '{$newImage}'";
            $params = "WHERE idusuario = '{$id}'";
            parent::update($terms, $params);
        }
    }
    
    public function deleteImagem(int $id)
    {   
     
        $imgName = (new User())->findUser("imagem" , "idusuario = " , "'{$id}'")->fetch(true);
        $updateImage = new Upload();
        $deletefile = $updateImage->deleteImagem($imgName);

        if ($deletefile) {
        parent::delete("idusuario =" ,$id);
        }
    }
    


}