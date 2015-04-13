# mvc_template

/********* Instructions *********/
- Create database (see sql.txt)
- Create folders

    controllers

    includes

    utilities

    models

    views

- Create utilities/view.php --> Create PHP templates
- Create utilities/db.php --> Connecting to the database - singleton class
- Create index.php --> Setting autoupload - include basic files
- Create config.php --> Data needed to connect to the database
- Create utilities/bootstrap.php --> Setting default controller
- Create controllers/controller.php --> Create controller base class
- Create models/model.php --> Create model base class . Other models inherit
- Create models/blogmodels.php --> Create blog model
- Create controllers/blogcontroller.php --> Create blog controller
- Create views/includes/menu.inc.php --> nav menu
- Create views/blog/index.tpl --> default view for blog

- Create .htaccess 

  RewriteEngine On

  RewriteCond %{REQUEST_FILENAME} !-f
  
  RewriteCond %{REQUEST_FILENAME} !-d

  RewriteRule ^(.*)$ index.php?load=$1 [PT,L]


- Add function detail to controllers/blogcontroller.php
- Create views/blog/detail.tpl

/********* Reference *********/
- http://salopek.eu/content/28/create-a-simple-php-mvc-framework
- https://daveismyname.com/creating-a-blog-from-scratch-with-php-bp

/********* commit to github *******/
echo "# mvc_template" >> README.md

git init

git add README.md 

git add .

git commit -m "first commit"

git remote add origin https://github.com/khanhdeux/mvc_template.git

git push -u origin master

/*** ADD FROM OTHER MACHINE ***/

