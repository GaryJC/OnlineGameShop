<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title>Gamers!</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
        <header>
            <section class="brand">
                <a href="index.php"><img src="img/logo.png" alt=""></a>
                <nav class="navbar">
                    <ul>
                        <!-- <li><a href="addtocart.php">Cart</a></li>
                        <li><a href="logIn.php">Log In</a></li>
                        <li><a href="signUp.php">Sign Up</a></li> -->
                        <?php
                        session_start();
                        
                        if (isset($_SESSION['valid_user'])) {
                            echo "<li><a href = 'logIn.php'>" . $_SESSION['valid_user'] . "</a></li>";
                            // echo "<li><a href = 'filter.php'> Filter </a><li>";
                        } else {
                            echo "<li><a href = 'logIn.php'>Log In</a></li>";
                        }
                        ?>
                    <li><a href="./signUp.php">Sign Up</a></li>
                    <li><a href="./addtocart.php">cart</a></li>
                    </ul>
                </nav>
            </section>
        </header>

        <main>
            <section class="typesofwines">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <!-- <li><a href="">News</a></li> -->
                    <li><a href="filter.php">Games</a></li>

                </ul>
            </section>


            
                    
                    