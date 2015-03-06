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
        <?php include HOME .DS .'views'.  DS . 'includes' . DS . 'admin_menu.inc.php'; ?>    
        <div class="container">
          <table class="table table-condensed">
            <thead>
              <tr>
                <th>Username</th>
                <th>&nbsp;</th>
              </tr>
            </thead>
            <tbody>
            <?php 
                if ($users):
                foreach ($users as $u): ?>
                <tr>
                  <td><?php echo $u['username']; ?></td>
                  <td><a href="/mvc_template/admin/edituser/<?php echo $u['id']; ?>">Edit</a> | <a href="/mvc_template/admin/deleteuser/<?php echo $u['id']; ?>">Delete</a></td>
                </tr>
            <?php 
                endforeach;
                else: ?>  
            <?php endif; ?>
            </tbody>
          </table>
            <a href="/mvc_template/admin/adduser" class="btn btn-primary btn-block">Add</a>   
        </div>        

    </body>
</html>