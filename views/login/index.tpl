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

            <?php if(isset($errors)): ?>
                <?php foreach($errors as $error): ?>
                    <div class="alert alert-danger" role="alert">
                        <a href="#" class="alert-link"><?php echo $error ?></a>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>      
        
            <form action="/mvc_template/login/submit" method="post">                
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="username" class="form-control" id="username" name="username" placeholder="Enter username" value="<?php if(isset($formData)) echo $formData['username']; ?>">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" value="<?php if(isset($formData)) echo $formData['password']; ?>">
                </div>                                
                <input type="submit" name="loginFormSubmit" value="Send" />
            </form>

        </div>              
    </body>
</html>