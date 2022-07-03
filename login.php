<?php

    $username = "";
    $password = "";
    $failure = false;

    $salt = 'XyZzy12*_';
    $md5 = hash('md5', 'XyZzy12*_php123');         
    
    if ( isset($_POST['Cancel'] ) ) {
        // Redirect the browser to game.php
        header("Location: index.php");
        return;
    }

    if(isset($_POST['who']) &&  isset($_POST['pass'])){
        
        $username =  $_POST['who'];
        $password =  $_POST['pass'];

        if(strlen($username) < 1 || strlen($password) < 1){

            $failure = "User name and password are required.";
            
        }else{                  
       
            $combined = $salt .$password;

            $passwordToCheck = hash('md5', $combined);

            if($passwordToCheck == $md5){

                header("Location: game.php?name=".urlencode($_POST['who']));  
                return;

            }else{

                $failure = "Incorrect password";

            }
            
        }

    }   

?>

<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8">

        <title>CHRISTOPHER CLARKE Rock Paper Scissors Game Log In</title>

    </head>

    <body>

        <h1>Please Log In</h1>

        <?php

            if ($failure !== false ) {
                // Look closely at the use of single and double quotes
                echo('<p style="color: red;">'.htmlentities($failure)."</p>\n");
            }
        ?>

        <form method="POST">

            <P><label for="who">Username:</label>
            <input type="text" name="who" id="input1" size="40"></p>
            <p><label for="pass">Password:</label>
            <input type="password" name="pass" id="imput2" size="40"></p>
            <input type="submit" value="Log In">
            <input type="submit" value="Cancel">

        </form>

    </body>

</html>

