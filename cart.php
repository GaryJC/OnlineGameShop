<?php
include('navigationbar.html');
?>
<div class="rightContent">
<?php
require('databaseConnect.php');

session_start();
?>
<div class="slider">
        <img src="DeathStanding.png">
    </div>
    <div class = "signupfunction">
<?php

if (isset($_SESSION['valid_user'])) {
    //fps game
    $query = "SELECT imageURL FROM games WHERE genre='fps'";
    //$query = "SELECT* FROM cart";
    $result = mysqli_query($connection, $query);
    if ($result) {
        echo "success";
    } else {
        echo "fail";
    }

    echo "<div class='gameList'>";
    while ($row = mysqli_fetch_array($result)) {

        // foreach($row as $value){
        // echo "<img src='". $value."' alt='no'>";
        // }

        echo "<img src='" . $row['imageURL'] . "' alt='no'>";
    }
    echo "</div>";
} else {

}

?>

<style>
.gameList img{
    width:25vw;
}

.gameList{
    display:flex;
    flex-wrap:wrap;
    justify-content:space-around;
}
</style>
</div>

</div>

 </main>
<?php echo file_get_contents("footer.html"); ?>