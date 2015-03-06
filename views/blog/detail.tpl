<!DOCTYPE html>

<html lang="en">
    <head>
        <title><?php echo $title; ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>      

        <script type="text/javascript" src="/mvc_template/views/javascript/main.js"></script>      
        <link rel="stylesheet" type="text/css" href="/mvc_template/views/css/style.css">      
    </head>    
    <body>
        <?php include HOME .DS .'views'.  DS . 'includes' . DS . 'menu.inc.php'; ?>
        <div class="container-fluid">                        
            <article>
                <header>
                    <h1><?php echo $post['title'] ?></h1>
                </header>
                <p><?php echo $post['description']; ?></p>
                <p><a href="/mvc_template/blog/index">Back</a></p>
                <hr/>
            </article>
           <?php 
                if ($comments):
                foreach ($comments as $c): ?>
                    <div class="media">
                       <div class="media-left">
                           <a href="#">
                               <img class="media-object" data-src="holder.js/64x64" alt="64x64" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIHZpZXdCb3g9IjAgMCA2NCA2NCIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+PGRlZnMvPjxyZWN0IHdpZHRoPSI2NCIgaGVpZ2h0PSI2NCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjEzLjIyNjU2MjUiIHk9IjMyIiBzdHlsZT0iZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQ7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+NjR4NjQ8L3RleHQ+PC9nPjwvc3ZnPg==" data-holder-rendered="true" style="width: 64px; height: 64px;">
                           </a>
                       </div>
                       <div class="media-body">
                           <h4 class="media-heading"><?php echo $c['username']; ?></h4>
                           <?php echo $c['comment']; ?> 
                       </div>
                   </div>  
            <?php 
                endforeach;
                else: ?>  
            <?php endif; ?>            

            
            <?php if(isset($_SESSION['userID'])): ?>
            <form action="/mvc_template/blog/comment/<?php echo $post['id'] ?>" method="post">
                <textarea name="comment" id="comment" class="form-control" rows="3"></textarea>            
                <input type="submit" name="commentSubmit" class="btn btn-default" value="Submit"/>
            </form>
            <?php endif; ?>
        </div>        
    </body>
</html>