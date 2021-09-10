### Project made with bootstrap, css, php, javascript, html. It is a portfolio site for product display, with product display pages in detail, in addition to the administration section, where changes can be made to the bane, questions and answers, inclination and product editing.
| [pt-BR](README.pt-BR.md) | en-US - this file |
|---|---|

required .htaccess for removing routes;

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
## Index:


In the index are the routes of the pages, as well as your posts. Web.php is responsible for making all the display of the page, The admin page is divided into its functionality, such as editing the image of the content, changing the banner, in addition to changing the image of the administrator

The image below shows the home display on the desktop, on mobile.

![home](/readmeImag/home.png)
![home](/readmeImag/homeMobile.png)

And the image below shows a preview of the admin tab
![painel](/readmeImag/painel.png)
![painel](/readmeImag/painelMobile.png)




