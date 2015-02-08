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
        <?php include HOME . DS . 'includes' . DS . 'menu.inc.php'; ?>        
        <div class="container-fluid">                        
            <h1>Posts</h1>

            <?php 
                if ($posts):
                foreach ($posts as $p): ?>

                <article>
                    <header>
                        <h1><a href="/mvc_template/blog/detail/<?php echo $p['id']; ?>"><?php echo $p['title']; ?></a></h1>
                    </header>
                    <p><?php echo $p['description']; ?></p>
                    <p><a href="/mvc_template/blog/detail/<?php echo $p['id']; ?>">Continue reading</a></p>
                    <hr/>
                </article>
            <?php 
                endforeach;
                else: ?>

            <h1>Welcome!</h1>
            <p>We currently do not have any posts.</p>

            <?php endif; ?>            
        </div>              
    </body>
</html>