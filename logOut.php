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

if (isset($_SESSION['valid_user'])) {
	unset($_SESSION['valid_user']);
	echo "<h1>You have been logged out.</h1>";
	echo '<p><a href="index.php">Back to Home Page</a></p>';
	session_destroy();
	header('logOut.php');
} else {
	echo "<h1>You were not logged in.</h1>";
	echo '<p><a href="index.php">Back to Home Page</a></p>';
	
}

?>

</div>

</div>

 </main>
<?php echo file_get_contents("footer.html"); ?>
