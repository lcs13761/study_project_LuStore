<?php

namespace Source\App\Admin;

use Source\Model\Product;
use Source\Model\User;
use Source\Model\Image;

/**
 * Class Faq
 * @package Source\App\Admin
 */
class Content extends Admin
{
    /**
     * Faq constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    //Insert
    public function incluide(array $data): void
    {

        $id = $_SESSION['authUser'];
        $imagemUsuario = (new User)->findUser("imagem", "idusuario =", "'{$id}'")->fetch(true);
        if (!empty($imagemUsuario)) {
            $imagemUsuario = (array)$imagemUsuario[0];
            $imagemUsuario = array_filter($imagemUsuario);
            foreach ($imagemUsuario as $img => $value); {
            }
        } else {
            $value = null;
        }

        if (!empty($data) && !in_array("", $_FILES["imagem"]["name"])) {
            if (count($_FILES["imagem"]["name"]) < 5) {
                $product = new Product();
                $image = new Image();
                if (!in_array("", $data)) {
                    $image->insertImage($_FILES);
                    $product->insertProduct($data);
                } else {
                    echo "preencha todos os campos";
                }
                redirect("/admin/painel/home");
            } else {
                echo "maximo 4 arquivos";
            }
        }

        $head = $this->seo->render(
            CONF_SITE_NAME . " | Dashboard",
            CONF_SITE_DESC,
            url("/admin/painel/home/adicionar"),
            CONF_VIEW_ADMIN,
            false
        );

        echo $this->view->render("Addeditar/adicionar", [
            "head" => $head,
            "imgUsuario" => $value
        ]);
    }

    public function delete(array $data)
    {
        $product = new Image();
        $product->deleteImage($data["id"]);
    }
    //EDITAR
    public function update(array $data): void
    {

        $editar = true;
        $id = $data['id'];
        $editarPrd = (new Product())->findPrdt("*", "content.id = ", "'{$id}'")->fetch(true);
        $edPrd = (array)$editarPrd[0];
        $idimagem = $edPrd['idimagem'];
        $imagem = (new Image())->findImage("*", "imagem.id =", "'{$idimagem}'")->fetch(true);
        if (!empty($imagem)) {
            $imagem = (array)$imagem[0];
            $imagem = array_filter($imagem);
            $idimagem = $imagem['id'];
            $imagem = array_diff($imagem, [$id]);
        }
        
        ///imagem usuario

        $id = $_SESSION['authUser'];
        $imagemUsuario = (new User)->findUser("imagem", "idusuario =", "'{$id}'")->fetch(true);
        if (!empty($imagemUsuario)) {
            $imagemUsuario = (array)$imagemUsuario[0];
            $imagemUsuario = array_filter($imagemUsuario);
            foreach ($imagemUsuario as $img => $value); {
            }
        } else {
            $value = null;
        }


        $head = $this->seo->render(
            CONF_SITE_NAME . " | Dashboard",
            CONF_SITE_DESC,
            url("/admin/painel/home/adicionar"),
            CONF_VIEW_ADMIN,
            false
        );


        echo $this->view->render("Addeditar/adicionar", [
            "editar" => $editar,
            "head" => $head,
            "update" => $edPrd,
            "imagem" => $imagem,
            "idimage" => $idimagem,
            "imgUsuario" => $value
        ]);
    }
    public function updateProduct(array $data): void
    {

        $product = new Product();
        $product->updateProduct($data);

        redirect("/admin/painel/home");
    }
    public function updateImage(array $data): void
    {
        var_dump($_FILES);
        var_dump($data);
        $url = [$data['produto'], $data['title']];
        $url = implode("/", $url);

        $id = $data['id'];
        $data = array_diff($data, [$id], [$data['produto']], [$data['title']]);
        foreach ($data as $data => $value) {
        }

        if ($data == "update") {
            if (!empty($imagem['imagem']['name'])) {
                $image = new Image();
                $image->updateImage($value, $imagem, $id);
            }
        } else {
            $image = new Image();
           $image->removeImage($value, $id);
        }
        redirect("/admin/painel/home/editar/{$url}");
    }
    public function updateImagemt(array $data)
    {

        $url = [$data['produto'], $data['title']];
        $url = implode("/", $url);
        $id = $data['id'];
        if (!empty($_FILES['imagem']['name'])) {
            var_dump($data);
            if (count($_FILES["imagem"]["name"]) < 5) {
                $action = new Image();
                $action->updateImagemt($_FILES, $id);
            } else {
                redirect("/admin/painel/home/editar/{$url}");
            }
            redirect("/admin/painel/home/editar/{$url}");
        } else {
            redirect("/admin/painel/home/editar/{$url}");
        }
    }
}
