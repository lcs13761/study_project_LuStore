<?php


use Pecee\SimpleRouter\SimpleRouter;


require __DIR__ . "/vendor/autoload.php";
require_once 'routes/web.php';
require_once 'routes/admin.php';

use Source\Core\Session;

$session = new Session();
SimpleRouter::setDefaultNamespace('Source\App');

SimpleRouter::start();

// $router->group("/",function($route){

//     $route->get("/",'HomeController::index');
//     $route->get("/login","AuthController::index");
    

// });

// use CoffeeCode\Router\Router;
// $route = new Router(url(), ":");

// /**
//  * Route
//  */
// $route->namespace("Source\App");
// $route->get("/" , "Web:home");
// $route->get("/p/{page}" , "Web:home");

// /***** */
// $route->get("/buscar/{search}/{pager}" , "Web:search");
// $route->post("/buscar" , "Web:search");

// /*****sobre */
// $route->get("/sobre","Web:about");
// /**
//  * content
//  */
// $route->get("/content/{pager}" , "Web:content");
// $route->post("/content/{pager}" , "Web:content");



// /**admin */
// $route->namespace("Source\App\Admin");
// $route->group("/admin");

// //login
// $route->get("/", "Login:root");
// $route->get("/login", "Login:login");
// $route->post("/login", "Login:login");
// $route->get("/painel/home/logout" , "Painel:logoff");

// //Painel
// $route->get("/painel" , "Painel:painel");
// /**
//  * Home
//  */
// $route->get("/painel/home" , "Home:home");
// $route->get("/painel/home/p/{pager}" , "Home:home");
// $route->post("/painel/home" , "Home:home");
// //painel search
// $route->get("/painel/home/search/{search}/{page}" , "Home:search");
// $route->post("/painel/home/search" , "Home:search");
// //image user in home
// $route->get("/painel/home/userimagem" , "Home:user");
// $route->post("/painel/home/userimagem" , "Home:user");
// /**
//  * Content
//  */
// //Content adicionar
// $route->get("/painel/home/adicionar" , "Content:incluide");
// $route->post("/painel/home/adicionar" , "Content:incluide");
// //Content ediar
// $route->get("/painel/home/editar/{id}/{title}" , "Content:update");
// $route->post("/painel/home/editar" , "Content:update");
// $route->get("/painel/home/editar/conteudo" , "Content:updateProduct");
// $route->post("/painel/home/editar/conteudo" , "Content:updateProduct");
// $route->get("/painel/home/editar/imagem" , "Content:updateImage");
// $route->post("/painel/home/editar/imagem" , "Content:updateImage");
// $route->get("/painel/home/editar/imagem/mupltiplus" , "Content:updateImagemt");
// $route->post("/painel/home/editar/imagem/mupltiplus" , "Content:updateImagemt");
// //Content delete
// $route->get("/painel/home/delete" , "Content:delete");
// $route->post("/painel/home/delete" , "Content:delete");
// //painel banner insert e update
// $route->get("/painel/home/banner" , "Banner:banner");
// $route->get("/painel/home/banner/insert" , "Banner:bannerInsert");
// $route->post("/painel/home/banner/insert" , "Banner:bannerInsert");
// $route->get("/painel/home/banner/update" , "Banner:bannerUpdate");
// $route->post("/painel/home/banner/update" , "Banner:bannerUpdate");
// /**perguntas&respostas */
// $route->get("/perguntas-respostas", "Faq:home");
// $route->post("/perguntas-respostas", "Faq:home");
// $route->get("/perguntas-respostas/adicionar", "Faq:include");
// $route->post("/perguntas-respostas/adicionar", "Faq:include");
// $route->get("/perguntas-respostas/update", "Faq:update");
// $route->post("/perguntas-respostas/update", "Faq:update");
// $route->get("/perguntas-respostas/delete", "Faq:delete");
// $route->post("/perguntas-respostas/delete", "Faq:delete");

// /**
//  * erro router
//  */
// $route->namespace("Source\App")->group("/ops");
// $route->get("/{errcode}", "Web:error");

// /**
//  * 
//  * Router
//  */
// $route->dispatch();

// /**
//  * test erro
//  */
// if($route->error())
// {
//     $route->redirect("/ops/{$route->error()}");
// }

