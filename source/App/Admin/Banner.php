<?php

namespace Source\App\Admin;

use Source\Model\Banners;
use Source\Model\User;

/**
 * Class Faq
 * @package Source\App\Admin
 */
class Banner extends Admin
{
    /**
     * Faq constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }
    public function banner(array $data)
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


        $banner = (new Banners())->find(" WHERE id =", "'1';")->fetch(true);
        if (!empty($banner)) {
            $banner = (array)$banner[0];
            $banner = array_filter($banner);
            $banner = array_diff($banner, [$banner['id']]);
        }
        $head = $this->seo->render(
            CONF_SITE_NAME,
            CONF_SITE_DESC,
            url("/admin/painel/home/banner"),
            CONF_VIEW_ADMIN,
            false
        );
        echo $this->view->render("imgpost/banner.php", [
            "head" => $head,
            "banner" => $banner,
            "imgUsuario" => $value
        ]);
    }
    public function bannerUpdate(array $data)
    {
        foreach ($data as $data => $value) {
        }
        $banner = new Banners();
        if ($data == "update") {
            if (!empty($_FILES['imagem']['name'])) {
                var_dump($_FILES);
                $banner->updateBanner($value, $_FILES);
                redirect("/admin/painel/home/banner");
            } else {
                redirect("/admin/painel/home/banner");
            }
        } else {
            $banner->deleteBanner($value);
            redirect("/admin/painel/home/banner");
        }
    }
    public function bannerInsert(array $data)
    {

        if (!empty($_FILES['imagem']['name'])) {
            if (count($_FILES["imagem"]["name"]) < 4) {
                $insert = new Banners();
                $insert->insertBanner($_FILES);
            } else {
                redirect("/admin/painel/home/banner");
            }
        } else {
                redirect("/admin/painel/home/banner");
        }
    }
}
