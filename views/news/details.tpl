<!DOCTYPE html>
 
<html lang="en">
    <head>
      <title><?php echo $title; ?></title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    </head>    
    <body>
        <div class="container-fluid">
            <?php include HOME .DS .'views'.  DS . 'includes' . DS . 'menu.inc.php'; ?>

            <article>
                <header>
                    <h1><?php echo $title; ?></h1>
                    <p>Published on: <time pubdate="pubdate"><?php echo $datePublished; ?></time></p>
                </header>
                <p>
                    <?php echo $articleBody; ?>
                </p>
            </article>

            <a href="/mvc_template">Back to article list</a>
        </div> 
    </body>
</html>