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
        <?php include HOME . DS . 'includes' . DS . 'admin_menu.inc.php'; ?>    
        <div class="container">
          <table class="table table-condensed">
            <thead>
              <tr>
                <th>Title</th>
                <th>&nbsp;</th>
              </tr>
            </thead>
            <tbody>
            <?php 
                if ($posts):
                foreach ($posts as $p): ?>
                <tr>
                  <td><?php echo $p['title']; ?></td>
                  <td><a href="/mvc_template/admin/editpost/<?php echo $p['id']; ?>">Edit</a> | <a href="/mvc_template/admin/deletepost/<?php echo $p['id']; ?>">Delete</a></td>
                </tr>
            <?php 
                endforeach;
                else: ?>  
            <?php endif; ?>
            </tbody>
          </table>
          <a href="/mvc_template/admin/addpost" class="btn btn-primary btn-block">Add</a> 
        </div>        

    </body>
</html>