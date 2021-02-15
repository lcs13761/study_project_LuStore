<?php

namespace Source\App\Admin;

use Source\Model\About;

/**
 * Class Faq
 * @package Source\App\Admin
 */
class Faq extends Admin
{
  /**
   * Faq constructor.
   */
  public function __construct()
  {
    parent::__construct();
  }



  public function home(array $data): void
  {

    $head = $this->seo->render(
      "Conheca a " . CONF_SITE_NAME,
      CONF_SITE_DESC,
      url("/sobre"),
      ""
    );

    $about = (new About())->findPergunt()->fetch(true);

    echo $this->view->render("Faq/faq", [
      "about" => $about,
      "head" => $head
    ]);
  }

  public function include(array $data)
  {

    if (!empty($data)) {
      $terms = [];
      $params = [];
      foreach ($data as $dt => $value) {
        $terms[] = $dt;
        $params[] = $value;
      }
      $terms = implode(",", $terms);
      $params =  "'" . implode("','", $params) . "'";
      $faq = (new About())->insert($terms, $params);
      redirect("/admin/perguntas-respostas");
    } else {
      redirect("/admin/perguntas-respostas");
    }
  }

  public function update(array $data)
  {
    $update = $data['editar'];
    $data = array_diff($data, [$update]);
    $terms = [];
    foreach ($data as $dt => $value) {
      array_push($terms, "{$dt} = '{$value}'");
    }
    $terms = implode(",", $terms);
    $faq = (new About())->update($terms, " WHERE id = '{$update}'");
    redirect("/admin/perguntas-respostas");
  }

  public function delete(array $data)
  {

    $terms  = implode(",", $data);
    $faq = (new About())->delete(" id = ", $terms);
    redirect("/admin/perguntas-respostas");
  }
}
