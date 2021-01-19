<?php
include('navigationbar.php');
?>
<div class="rightContent">
<?php
//session_start();
?>
<div class="slider">
        <img src="DeathStanding.png">
    </div>
    <div class = "signupfunction">
<?php
echo "You are Logged as " . $_SESSION['valid_user'];
echo "</br>";
echo "<a href='logOut.php'>Click here to log out</a>";

require('databaseConnect.php');

?>

<form method="POST" action="changePassword.php">
Change Password:
<input type="text" name="newPassword">
<input class="submit_button" type="submit" name="submit" value="Submit">
</form>
</div>

</div>

 </main>
<?php echo file_get_contents("footer.html"); ?>
