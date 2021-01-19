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

//session_start();
?>

 <div class="slider">
        <img src="DeathStanding.png">
    </div>

<?php
if (!isset($_SESSION['valid_user'])) {
    ?>
    <div class = "signupfunction">
        <form method="POST" action="logIn.php">
            Email: <br>
            <input type="text" name="email"><br>
            <!-- User Name: <br>
            <input type="text" name="userName"><br> -->
            Password: <br>
            <input type="text" name="password"><br>
            <input class="submit_button" type="submit" name="submit" value="Submit">
        </form>
</div>
    <?php
// Note: arrive at this page only if there is no active session
    // If form submitted, insert values into the database.
    if (isset($_POST['submit'])) {
        // removes backslashes
        $email = stripslashes($_POST['email']);
        //escapes special characters in a string
        $email = mysqli_real_escape_string($connection, $email);

        $password = stripslashes($_POST['password']);
        $password = mysqli_real_escape_string($connection, $password);

        //Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE email='$email'
            and password='$password'";
        $result = mysqli_query($connection, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);

        if ($rows == 1) {
            $res = mysqli_fetch_array($result);
            $userName = $res['userName'];

            $_SESSION['valid_user'] = $userName;
            //Redirect user to index.php
            header("Location: member.php");
            // echo "You are Logged as " . $_SESSION['valid_user'];
            // echo "<a href='logOut.php'>Click here to log out</a>";
        } else {
            echo "<h3>Username/password is incorrect.</h3>
      <br/>Click here to <a href='login.php'>Login</a>";
            echo "<p>Not registered yet? <a href='signUp.php'>Register Here</a></p>";
        }
    } else {
        ?>

    <?php }
} else {
    header("Location: member.php");
    //redirect to other page
    // echo "You are Logged as " . $_SESSION['valid_user'];
    // echo "</br>";
    // echo "<a href='logOut.php'>Click here to log out</a>";
    // unset($_SESSION['valid_user']);
    // session_destroy();
}?>

 </main>
<?php echo file_get_contents("footer.html"); ?>