### Para uma visualição do projeto acesse https://www.lucasdevjr.com.br/ 

### Projeto feito com bootstrap, css,php, javascript, html sendo ele responsivel. É um site portifolio para exibição de produtos , com paginas de exibicao do protudo em detalhe, alem de possui a parte do administrado , aonde podera ser feita mudancas no bane , nas perguntas é respostas , inclução é edição de produtos.
| [en-US](README.md) | pt-BR this file |
|---|---|

.htaccess necessário para as rotas;
## .htaccess
```apacheconf
RewriteEngine On
Options All -Indexes

# ROUTER WWW Redirect.
RewriteCond %{HTTP_HOST} !^www\. [NC]
RewriteRule ^ https://www.%{HTTP_HOST}%{REQUEST_URI} [L,R=301]

# ROUTER HTTPS Redirect
RewriteCond %{HTTP:X-Forwarded-Proto} !https
RewriteCond %{HTTPS} off
RewriteRule ^ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]

# ROUTER URL Rewrite
RewriteCond %{SCRIPT_FILENAME} !-f
RewriteCond %{SCRIPT_FILENAME} !-d
RewriteRule ^(.*)$ index.php?route=/$1
```
##

Na index estao as rotas das pagina , como tambem seus post. A Web.php é a responsavel por fazer todas a exibição da pagina, A pagina do admin esta divido em suas funcionalidade, como a edicao da imagem do conteudo, mudanca do banner, alem disso tb a mudanca da imagem do adiministrado



A imagem abaixo mostra a exibição da home no desktop, é no mobile. 

![home](/readmeImag/home.png)
![home](/readmeImag/homeMobile.png)

E as imagem abaixo mostra uma prev exibição da aba do administrado
![painel](/readmeImag/painel.png)
![painel](/readmeImag/painelMobile.png)







