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
        <div class="container-fluid">                        

        <?php 
        if (isset($errors)) 
        {
            echo '<ul>';
            foreach ($errors as $e)
            {
                echo '<li>' . $e . '</li>';
            }
            echo '</ul>';
        }                 
        ?>            
            <form action="/mvc_template/admin/submitedituser/<?php if(isset($user)) echo $user['id']; ?>" method="post">

                <p>
                    <label for="username">User name:</label>
                    <input value="<?php if(isset($user)) echo $user['username']; ?>" type="text" id="username" name="username" />
                </p>

                <p>
                    <label for="password">Password:</label>
                    <input value="<?php if(isset($user)) echo $user['password']; ?>" type="password" id="password" name="password" />
                </p>
                
                <input type="submit" name="editUserSubmit" value="Send" />
            </form>

        </div>       

    </body>
</html>