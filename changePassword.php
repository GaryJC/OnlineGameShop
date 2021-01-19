<?php
include('navigationbar.php');
?>
<div class="rightContent">

<?php
//session_start();

// $connection = mysqli_connect("localhost", "root", "", "gamestore");
// if (mysqli_connect_errno()) {
//     echo "Failed to connect to MySQL: " . mysqli_connect_error();
// } else {
//     echo "Connect Success!";
// }

require('databaseConnect.php');
?>
<div class="slider">
        <img src="DeathStanding.png">
    </div>
    <div class = "signupfunction">
<?php

if(isset($_POST['submit'])){
    $new_password = stripslashes($_POST['newPassword']);
    //$new_password=$_POST['newPassword'];
    $new_password = mysqli_real_escape_string($connection, $new_password);
}

//echo $_SESSION['valid_user'];
$userName=$_SESSION['valid_user'];
//$query="UPDATE users SET password='$new_password' WHERE username=$userName";
$query="UPDATE users SET password='$new_password' WHERE userName='".$_SESSION['valid_user']."'";
echo $query;
$result = mysqli_query($connection, $query);
if ($result) {
    echo "success";
} else {
    echo "fail";
}
?>

</div>

</div>

 </main>
<?php echo file_get_contents("footer.html"); ?>