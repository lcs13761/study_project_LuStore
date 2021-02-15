<?php

namespace Source\App;

use Source\Core\Pager;
use Source\Model\About;
use Source\Model\Product;
use Source\Core\Controller;
use Source\Model\Banners;
/**
 * Web Controller
 * @package Source\App
 */
class Web extends Controller
{
    /**
     * Web constructor.
     */
    public function __construct()
    {
        parent::__construct(__DIR__ . "/../../themes/" . CONF_VIEW_THEME . "/");
    }

    /**
     * SITE HOME
     */
    public function home(array $data): void
    {

        $head = $this->seo->render(
            "Site Modelo  .Conheca a " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            ""
        );
        $banner = (new Banners())->find(" WHERE id =", "'1';")->fetch(true);

        $count = (new Product)->count();
        $pager = new Pager(url("/p/"));
        $pager->pager($count, 9, ($data['page'] ?? 1));
        $product = (new Product())->findProduct("content.* , imagem1")->order("id DESC")->limit($pager->limit())->offset($pager->offset())->fetch(true);

       
        echo $this->view->render("home", [
            "product" => $product,
            "head" => $head,
            "paginator" => $pager->render(),
            "banner" => $banner
        ]);
      
    }
    /**
     * about
     */
    public function about(): void
    {
        $head = $this->seo->render(
            "Conheca a " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url("/sobre"),
            ""
        );

        $about = (new About())->findPergunt()->fetch(true);

        echo $this->view->render("about", [
            "about" => $about,
            "head" => $head,
        ]);
    }
    /**
     * content
     */
    public function content(array $data): void
    {

        $url = "'" . implode("','", $data) . "'";
        $url = mb_ereg_replace("-", " ", $url);

        $product = (new Product())->findProduct("imagem.*", null,  "title =" . $url)->fetch(true);
        $content = (new Product())->findProduct("content.*", null,  "title =" . $url)->fetch(true);
       
        $title = $content[0]->title;
        $value = $content[0]->value_product;
        $description = $content[0]->description;

        $head = $this->seo->render(
            "Conheca a " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url("/content/{page}"),
            ""
        );

        echo $this->view->render("content", [
            "product" => $product,
            "title" => $title,
            "value" => $value,
            "description" => $description,
            "head" => $head,
        ]);
    }

    public function search(array $data): void
    {

        if (!empty($data['s'])) {
            $search = str_search($data['s']);
            redirect("/buscar/{$search}/1");
            return;
        } elseif (empty($data['search'])) {
            redirect(" ");
        }
        $search = str_search($data['search']);
        $page = (filter_var($data['pager'] ?? null, FILTER_VALIDATE_INT) >= 1 ? $data['pager'] : 1);

        $count = (new Product)->count(" WHERE title like ('%{$search}%') OR description like ('%{$search}%')");
        $pager = new Pager(url("/buscar/{$search}/"));

        $pager->pager($count, 6, $page);
        $bSearch = (new Product())->findProduct("*", null, " title like ('%{$search}%') OR description like ('%{$search}%')")->limit($pager->limit())->offset($pager->offset())->fetch(true);

        $head = $this->seo->render(
            CONF_SITE_NAME . " | Dashboard",
            CONF_SITE_DESC,
            url("/buscar/{search}/{pager}"),
            CONF_VIEW_ADMIN,
            false
        );

        echo $this->view->render("search", [
            "search" => $bSearch,
            "paginator" => $pager->render(),
            "head" => $head,
        ]);
    }

    /**Error */
    public function error(array $data): void
    {
        $error = new \stdClass();
        switch ($data['errcode']) {
            case "problemas":
                $error->code = "OPS";
                $error->title = "Estamos enfrentando problemas!";
                $error->message = "Parece que nosso serviço não está diponível no momento. Já estamos vendo isso mas caso precise, envie um e-mail :)";
                $error->linkTitle = "ENVIAR E-MAIL";
                $error->link = "mailto:";
                break;

            case "manutencao":
                $error->code = "OPS";
                $error->title = "Desculpe. Estamos em manutenção!";
                $error->message = "Voltamos logo! Por hora estamos trabalhando para melhorar nosso conteúdo para você controlar melhor as suas contas :P";
                $error->linkTitle = null;
                $error->link = null;
                break;
            default:
                $error->code = $data['errcode'];
                $error->title = "Ooops. Conteúdo indispinível :/";
                $error->message = "Sentimos muito, mas o conteúdo que você tentou acessar não existe,
                está indiponivel no momento ou foi removido";
                $error->linkTitle = "Continue Navegando";
                $error->link = url_back();

                break;
        }

        $head = $this->seo->render(
            "{$error->code} | {$error->title}",
            $error->message,
            url("/ops/{$error->code}"),
            "",
            false
        );

        echo $this->view->render("error", [
            "error" => $error,
            "head" => $head,
        ]);
    }
}
