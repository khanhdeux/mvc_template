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
        <?php include HOME . DS . 'includes' . DS . 'menu.inc.php'; ?>        
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
            <form action="/mvc_template/login/submit" method="post">

                <p>
                    <label for="username">User name:</label>
                    <input value="<?php if(isset($formData)) echo $formData['username']; ?>" type="text" id="username" name="username" />
                </p>

                <p>
                    <label for="password">Password:</label>
                    <input value="<?php if(isset($formData)) echo $formData['password']; ?>" type="password" id="password" name="password" />
                </p>
                
                <input type="submit" name="loginFormSubmit" value="Send" />
            </form>

        </div>              
    </body>
</html>