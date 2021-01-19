<?php
include('navigationbar.php');
?>
<div class="rightContent">
<?php
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
    <div class = "signupfunction">
<?php
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    $items = $_SESSION['cart'];
    $cartitems = explode(",", $items);
    echo "<div class='gameList'>";

    foreach ($cartitems as $key => $id) {

        $query = "SELECT * FROM games WHERE gameID = $id";
        $result = mysqli_query($connection, $query);
        // if ($result) {
        //     echo "success";
        // } else {
        //     echo "fail";
        // }
        $row = mysqli_fetch_assoc($result);
        echo "<figure>";
        echo "<img src='" . $row['imageURL'] . "' alt='no'>";
        echo "<figcaption>" . $row['gameName'] . "</figCaption>";

        echo "<figcaption><a href='addtoCart.php?remove=" . $key . "' role='button'> Remove </a></figcaption>";
        echo "</figure>";

    }
    echo "</div>";
}

if (isset($_SESSION['valid_user'])) {
    if (!empty($_SESSION['cart'])) {
        $items = $_SESSION['cart'];
        $cartitems = explode(",", $items);
        if (isset($_GET['remove'])) {
            $delitem = $_GET['remove'];
            echo $delitem;
            unset($cartitems[$delitem]);
            $itemids = implode(",", $cartitems);
            $_SESSION['cart'] = $itemids;
            header('location:addtocart.php');
        }
    }
} else {
    echo "Please Login first";  
    echo "</br>";
    echo "<a href='logIn.php'>Click here to login</a>";

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

.gameList figcaption{
    text-align:center;
}
</style>

</div>

</div>

 </main>
<?php echo file_get_contents("footer.html"); ?>
