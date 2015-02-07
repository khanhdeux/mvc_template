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
            
            <?php include HOME . DS . 'includes' . DS . 'menu.inc.php'; ?>

            <h1>News article</h1>

            <?php 
                if ($articles):
                foreach ($articles as $a): ?>

                <article>
                    <header>
                        <h1><a href="/mvc_template/news/details/<?php echo $a['id']; ?>"><?php echo $a['title']; ?></a></h1>
                        <p><?php echo $a['category_name']; ?></p>
                        <p>Published on: <time pubdate="pubdate"><?php echo $a['date']; ?></time></p>
                    </header>
                    <p><?php echo $a['intro']; ?></p>
                    <p><a href="/mvc_template/news/details/<?php echo $a['id']; ?>">Continue reading</a></p>
                    <hr/>
                </article>
            <?php 
                endforeach;
                else: ?>

            <h1>Welcome!</h1>
            <p>We currently do not have any articles.</p>

            <?php endif; ?>            
        </div>              
    </body>
</html>