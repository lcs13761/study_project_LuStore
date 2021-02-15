<?php

namespace Source\App\Admin;

use Source\Model\Product;
use Source\Core\Pager;
use Source\Model\User;
/**
 * Class Faq
 * @package Source\App\Admin
 */
class Home extends Admin
{
    /**
     * Faq constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }
    public function user(array $data): void
    {
        foreach ($data as $data => $value) {
        }
        $user = new User();
        if ($data == "Salvar") {
            if (!empty($_FILES['imagem']['name'])) {
                $id = $_SESSION["authUser"];
                $action = $user->insertImagem($_FILES);
                redirect("/admin/painel/home");
            } else {
                redirect("/admin/painel/home");
            }
        } elseif ($data == "Editar") {
            if (!empty($_FILES['imagem']['name'])) {
                $id = $_SESSION["authUser"];
                $user = $user->updateImagem($_FILES, $id);
                redirect("/admin/painel/home");
            } else {
                redirect("/admin/painel/home");
            }
        } elseif ($data == "Deletar") {

            $id = $_SESSION["authUser"];
            $user = $user->deleteImagem($id);
            redirect("/admin/painel/home");
        }
    }

    public function home(?array $data): void
    {

        $count = (new Product)->count();
        $pager = new Pager(url("/admin/painel/home/p/"));
        $pager->pager($count, 6, ($data['pager'] ?? 1));
        $product = (new Product())->findProduct("content.* , imagem1")->order("id DESC")->limit($pager->limit())->offset($pager->offset())->fetch(true);

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
            url("/admin/painel/home"),
            CONF_VIEW_ADMIN,
            false
        );
        echo $this->view->render("Painel/painel", [
            "head" => $head,
            "product" => $product,
            "paginator" => $pager->render(),
            "imgUsuario" => $value

        ]);
    }
    public function search(array $data): void
    {

        if (!empty($data['s'])) {
            $search = str_search($data['s']);
            redirect("/admin/painel/home/search/{$search}/1");
            return;
        } elseif (empty($data['search'])) {
            //se o data estive vazio , redireciona para a home 
            redirect("/admin/painel/home");
        }



        $search = str_search($data['search']);
        $page = (filter_var($data['page'], FILTER_VALIDATE_INT) >= 1 ? $data['page'] : 1);
        $count = (new Product)->count(" WHERE title like ('%{$search}%') OR description like ('%{$search}%')");

        $head = $this->seo->render(
            CONF_SITE_NAME . " | Dashboard",
            CONF_SITE_DESC,
            url("/admin/painel/home/{$search}/{page}"),
            CONF_VIEW_ADMIN,
            false
        );


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


        $pager = new Pager(url("admin/painel/home/search/{$search}/"));
        $pager->pager($count, 6, $page);
        $product = (new Product())->findProduct("*", null, " title like ('%{$search}%') OR description like ('%{$search}%')")->limit($pager->limit())->offset($pager->offset())->fetch(true);


        echo $this->view->render("Painel/painel", [
            "head" => $head,
            "product" => $product,
            "paginator" => $pager->render(),
            "imgUsuario" => $value
        ]);
    }
}