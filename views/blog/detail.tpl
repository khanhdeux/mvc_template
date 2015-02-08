<!DOCTYPE html>
 
<html lang="en">
    <head>
      <title><?php echo $title; ?></title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
      
      <script type="text/javascript" src="/mvc_template/views/javascript/main.js"></script>      
      <link rel="stylesheet" type="text/css" href="/mvc_template/views/css/style.css">      
    </head>    
    <body>
        <div class="container-fluid">
            
            <?php include HOME . DS . 'includes' . DS . 'menu.inc.php'; ?>

            <article>
                <header>
                    <h1><?php echo $post['title'] ?></h1>
                </header>
                <p><?php echo $post['description']; ?></p>
                <p><a href="/mvc_template/blog/index">Back</a></p>
                <hr/>
            </article>
        </div>              
    </body>
</html>