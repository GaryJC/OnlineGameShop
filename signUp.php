<?php
include('navigationbar.php');
?>
<div class="rightContent">
<?php

// $connection = mysqli_connect("localhost", "root", "", "gamestore");

// if (mysqli_connect_errno()) {
//     echo "Failed to connect to MySQL: " . mysqli_connect_error();
// } else {
//     echo "Connect Success!";
// }

require('databaseConnect.php');
?>



<?php
//session_start();

?>  
    
    <div class="signUp_form">
    <div class="slider">
        <img src="DeathStanding.png">
    </div>
    <div class = "signupfunction">
    <form method="POST" action="">
        Email: <br>
        <input type="text" name="email"><br>
        User Name: <br>
        <input type="text" name="userName"><br>
        Password: <br>
        <input type="text" name="password"><br>
        <input class="submit_button" type="submit" name="submit" value="Submit">
    </form>
    </div>
    </div>

    <?php
if (isset($_POST['submit'])) {
    if (!empty($_POST['email']) && !empty($_POST['userName']) && !empty($_POST['password'])) {
        $userName = stripslashes($_POST['userName']);
        //escapes special characters in a string
        $userName = mysqli_real_escape_string($connection, $userName);

        $password = stripslashes($_POST['password']);
        $password = mysqli_real_escape_string($connection, $password);

        $email = stripslashes($_POST['email']);
        $email = mysqli_real_escape_string($connection, $email);

        //Checking is user existing in the database or not
        //     $query = "SELECT * FROM `users` WHERE email='$email'
        // and password='" . $password . "'";
        $query = "SELECT * FROM `users` WHERE email='$email'
            OR userName='$userName'";
        //echo $query;
        $result = mysqli_query($connection, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows > 0) {
            echo "<h3>Username already in use. Choose different username.</h3>";
            ?>
            <?php
} else {
            //         $query = "INSERT into `user` (email, password)
            // VALUES ('$email', '" . $password . "')";
            $query = "INSERT into `users` (email, username, password)
                 VALUES ('$email', '$userName', '$password')";
            $result = mysqli_query($connection, $query);
            //mysqli_close($connection);
            echo $query;
            if ($result) {
                echo "<p class='popup'>Congraluation! You are the member now!</P>";
                echo "<p>Your Email is " . $email . "</P>";
                echo "<p>Your username is " . $userName . "</P>";
                echo "<p>Your Password is " . $password . "</P>";
                $_SESSION['valid_user'] = $userName;
            }
        }
    } else { //user did not enter yet username - show form to enter data
        ?>
            <P class='warning'>You have not filled the required field!</P>
    <?php }
}

?>


    <style type="text/css">
        .warning {
            color: red;
            font-size: 1.5rem;
            text-align: center;
        }
    </style>
 </main>
<?php echo file_get_contents("footer.html"); ?>