<?php
include('navigationbar.php');
?>
<div class="rightContent">
<?php

//session_start();

require ('databaseConnect.php');
?>

<div class="slider">
        <img src="DeathStanding.png">
    </div>
    <div class = "signupfunction">

<?php

if (isset($_GET['id']) & !empty($_GET['id'])) {
    $gameID = $_GET['id'];
    $_SESSION['gameID'] = $gameID;
    //echo $gameID;
    $query = "SELECT * FROM games WHERE gameID='$gameID'";
    $result = mysqli_query($connection, $query);
    // if ($result) {
    //     echo "success";
    // } else {
    //     echo "fail";
    // }

    while($row = mysqli_fetch_array($result)){
        $gameName = $row['gameName'];
        $gamePrice = $row['price'];
        $imageURL = $row['imageURL'];
        $gameIntro = $row['intro'];
        ?>


        <h2><?php
         echo $gameName;   
        ?>
        </h2>
     
        <img src='<?php echo $imageURL ?>' alt="no">
        <h3>Price: <?php
         echo $gamePrice;   
        ?>

        </h3>
        
        <?php
        echo $gameIntro;
    }
}
?>


<form method="POST" action="">
<input type="hidden" name="userName" value="<?php $_SESSION['valid_user']?>">
<input type="hidden" name="date" value="<?php echo date('Y-m-d H:i:s') ?>">
<textarea name="message"></textarea>
<input type="submit" name="submit" value="Submit">
</form>

<?php

    //include('test.php');
if (isset($_POST['submit'])) {
    echo "yes";
    if (isset($_SESSION['valid_user'])) {
        if (!empty($_POST['message'])) {
            $date = stripslashes($_POST['date']);
            $date = mysqli_real_escape_string($connection, $_POST['date']);
            $userName = mysqli_real_escape_string($connection, $_SESSION['valid_user']);
            $message = mysqli_real_escape_string($connection, $_POST['message']);
            $gameID = mysqli_real_escape_string($connection, $_SESSION['gameID']);
            $comment_query = "INSERT INTO comments (gameID, userName, message,date) VALUES ('$gameID', '$userName', '$message', '$date')";
            //echo $comment_query;

            $comment_result = mysqli_query($connection, $comment_query);
            if ($comment_result) {
                echo "insert success";
            } else {
                echo "insert fail";
            }

        } else {
            echo "comment can not be empty";
        }

    } else {
        echo "you have to log in frist";
    }

    
}

if (isset($_GET['id']) & !empty($_GET['id'])) {
    $gameID = $_GET['id'];
    $display_query = "SELECT * FROM comments WHERE gameID=$gameID";
    $display_result = mysqli_query($connection, $display_query);
    // if ($display_result) {
    //     echo "display success";
    // } else {
    //     echo "display fail";
    // }

    while ($display_row = mysqli_fetch_array($display_result)) {
        ?>
        <h3>Username:
        <?php
            echo $display_row['userName'];
        ?>  
        </h3>
        <?php
             echo $display_row['date'];

        ?>
        <p>
        <?php
             echo $display_row['message'];
        ?>
        </p>
        <br>

        <?php
    }
}

?>


</div>

</div>

 </main>
<style>
img{
    width:80%;
}
</style>


<?php echo file_get_contents("footer.html"); ?>