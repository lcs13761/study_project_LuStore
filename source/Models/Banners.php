<?php

namespace Source\Model;

use Source\Core\Model;
use Source\Core\Upload;

class Banners extends Model
{

    protected static $entity = "banner";

    public function __construct()
    {
        parent::__construct("banner", "id");
    }

    public function findBanner(string $columns = "*", ?string $terms = null, ?string $params = null)
    {
        $terms = " WHERE {$terms}";
        $params = $params;


        return parent::find($terms, $params, $columns);
    }
    public function insertBanner(array $imagem)
    {
        $insert = new Upload();
        $imgName = $insert->image($imagem);
        $img = [];
        $values = [];
        foreach ($imgName as $imgs => $value) {
            $img[] = $imgs;
            $values[] = $value;
        }
        array_push($img, "id");
        array_push($values, "1");
        $terms = implode(",", $img);
        $params = "'" . implode("','", $values) . "'";
         parent::insert($terms, $params);
    }

    public function updateBanner(string $data, array $imagem)
    {
        $imgName = (new Banners())->findBanner("{$data}", " id = ", "'1'")->fetch(true);
        $updateImage = new Upload();
        $deletefile = $updateImage->deleteImagem($imgName);

        if ($deletefile) {
            $newImage = $updateImage->update($imagem);
            $newImage = implode("", $newImage);
            $terms = "{$data} = '{$newImage}'";
            $params = "WHERE id = '1'";
            parent::update($terms, $params);
        }
    }

    public function deleteBanner(string $data)
    {
        $imgName = (new Banners())->findBanner("{$data}", " id = ", "'1'")->fetch(true);
        $delete = new Upload();
        $deletefile = $delete->deleteImagem($imgName);
        if ($deletefile) {
            $terms = "{$data} = null";
            $params = "WHERE id = '1'";
            parent::update($terms, $params);
        }
        $verficar =  (new Banners())->findBanner("*", " id = ", "'1'")->fetch(true);
        $verficar = (array)$verficar[0];
        $verficar = array_diff($verficar, [$verficar['id']]);
        $verficar = array_filter($verficar);
        if(empty($verficar)){
            $terms = "id =";
            $params = "1";
            parent::delete($terms,$params);
        }
    }
}
