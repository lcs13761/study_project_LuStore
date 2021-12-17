<?php

namespace Source\Model;

use Source\Core\Database\Model;
use Source\Core\Upload;

class Image extends Model
{


    protected static $entity = "imagem";

    public function __construct()
    {
        parent::__construct("imagem", "id");
    }

    public function findImage(string $columns = "*", ?string $terms = null, ?string $params = null)
    {
        $terms = " WHERE {$terms}";
        $params = $params;


        return parent::find($terms, $params, $columns);
    }
    public function insertImage(array $image)
    {
        $auth = (new Upload());
        $nameImagem = $auth->image($image);
        $img = [];
        $values = [];
        foreach ($nameImagem as $imgs => $value) {
            $img[] = $imgs;
            $values[] = $value;
        }

        $column = implode(",", $img);
        $value = "'" . implode("','", $values) . "'";
        if (!empty($nameImagem)) {

            return parent::insert($column, $value);
        }
    }

    public function updateImage(string $data, array $imagem, int $id)
    {

        $updateImage = new Upload();
        $imgName = (new Image())->findImage("{$data}", "id = ", "'{$id}'")->fetch(true);
        $validacao = $updateImage->deleteImagem($imgName);

        if ($validacao) {
            $newImage = $updateImage->update($imagem);
            $newImage = implode("", $newImage);
            $terms = "{$data} = '{$newImage}'";
            $params = "WHERE id = {$id}";
            parent::update($terms, $params);
        }
    }
    public function updateImagemt(array $image, int $id)
    {
        $auth = (new Upload());
        $nameImagem = $auth->image($image);
        $prm = [];
        foreach ($nameImagem as $nameI => $value) {
            array_push($prm, "{$nameI} = '{$value}'");
        }
        $terms = implode(",", $prm);
        $params = "WHERE id = {$id}";
        parent::update($terms, $params);
    }
    public function removeImage(String $data, int $id)
    {
        
        $updateImage = new Upload();
        $imgName = (new Image())->findImage("{$data}", "id = ", "'{$id}'")->fetch(true);
        var_dump($imgName);
        $validacao = $updateImage->deleteImagem($imgName);

       if ($validacao) {
            $terms = "{$data} = null";
            $params = "WHERE id = '{$id}'";
            parent::update($terms, $params);
        }
    }

    public function deleteImage(int $id)
    {
        $imgName = $this->findImage("*", "id = ", "'{$id}'")->fetch(true);
        $auth = (new Upload());
        $validade = $auth->deleteImagem($imgName);
        if ($validade) {
            parent::delete("id = ", $id);
            redirect("/admin/painel/home");
        }
    }
}
