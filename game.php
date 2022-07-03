<?php

    // Demand a GET parameter
    if ( ! isset($_GET['name']) || strlen($_GET['name']) < 1  ) {
        die('Name parameter missing');
    }

    // If the user requested logout go back to index.php
    if ( isset($_POST['logout']) ) {
        header('Location: index.php');
        return;
    }

    $names = array('Rock', 'Paper', 'Scissors');

    $human = ISSET($_POST['human']) ? $_POST['human'] + 0 : -1;

    $computer = rand(0, 2);

    function check($computer, $human){
       
       if($human == $computer){
           return "Tie";
       } 

       if(($human == 0 && $computer == 1) || ($human == 1 && $computer == 2) || ($human == 2 && $computer == 0)){
            return "You lose";                    
       }

       if(($human == 1 && $computer == 0) || ($human == 2 && $computer == 1) || ($human == 0 && $computer == 2)){
           return "You win";
       }

       if($human == -1){
           return false;
       }

    }

    
    // Check to see how the play happenned
    $result = check($computer, $human);

?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="UTF-8">

        <title>CHRISTOPHER CLARKE Rock Paper Scissors Game</title>

    </head>

    <body>
    
        <h1>Rock Paper Scissors</h1>

        <?php

            if( isset($_REQUEST['name'])){
                echo("<p>Welcome: ");
                echo(htmlentities($_REQUEST['name']));
                echo("</p>\n");
            }            

        ?>

      
        <form method="post">
            <select name="human">
                <option value="-1">Select</option>
                <option value="0">Rock</option>
                <option value="1">Paper</option>
                <option value="2">Scissors</option>
                <option value="3">Test</option>
            </select>
            <input type="submit" value="Play">
            <input type="submit" name="logout" value="Logout">
        </form>
            
        <div>

            <br/>

            <?php

                if ( $human == -1 ) {
                    echo("Please select a strategy and press Play.\n");

                } else if ( $human == 3 ) {

                    for($c=0;$c<3;$c++) {
                      
                        for($p=0;$p<3;$p++) {

                            $r = check($c, $p);
                            echo("<p>Player=$names[$p] Computer=$names[$c] Result=$r </p>");
                        
                        }                    
                    }

                } else {
                    
                    echo("Your Play=$names[$human] Computer Play=$names[$computer] Result=$result");
                    echo("\n");

                }

            ?>

        </div>

    </body>

</html>