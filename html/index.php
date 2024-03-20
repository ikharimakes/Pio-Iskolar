<?php include('../php/functions.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Log In </title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <section>
        <!--IMAGE-->
        <div class="image">
            <img src="images/pio-museum.jpg">
        </div>

        <!--LOG IN-->
        <div class="contents">
            <div class="forms"> <center>
                <img class="pic-logo" src="images/pio-logo.png"> <br>
                <h2> Log In to PioIskolar </h2> </center> <br>
                
                <form action="" method="post">
                    <div class="inputs">
                        <span> Username </span>
                        <input type="text" name="user"> <br> <br>
                    </div>

                    <div class="inputs">
                        <span> Password </span>
                        <input type="password" name="pass">
                    </div>

                    <div class="inputs">
                        <a href="#"> Forgot Password </a> <br> <br>
                    </div>
                    
                    <div class="inputs">
                        <input type="submit" name="login">
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>