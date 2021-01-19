<html>
    <head>

    <style type="text/css">
#gameList img{
    width:25vw;
}

#gameList{
    display:flex;
    flex-wrap:wrap;
    justify-content:space-around;
}

#gameList figcaption{
    text-align:center;
}
.box{
    display:inline-block;
}
/* .dropdown_list{
    width:20%;
} */
select{
    background-color:#0563af;
    color:white;
    padding:12px;
    width:250px;
    height:50px;
    border:none;
    font-size:20px;
    box-shadow:0 5px 25px rgba(0,0,0,0.3);

}
#cate{
    background-color:#0563af;
    color:white;
    padding:12px;
    width:200px;
    border-radius:4px;
    height:50px;
    border:none;
    font-size:20px;
    box-shadow:0 5px 25px rgba(0,0,0,0.3);
}
</style>
</head>
<body>
<?php
include 'navigationbar.php';
?>
<div class="rightContent">
<?php
require 'databaseConnect.php';
?>

<div class="slider">
    <img src="DeathStanding.png">
    </div>
    <div class = "signupfunction">

<div class="dropdown_list">
<!-- <form action="" method="POST"> -->
    <div class="box">
<select id="genreList" >
<option value="ALL">ALL</option>
<option value="FPS">FPS</option>
<option value="ADVENTURE">ADVENTURE</option>
<option value="MOBA">MOBA</option>
</select>
</div>
<!-- <input id="cate" type="button" value="SUBMIT"> -->
<!-- </form> -->
</div>
<form >
    Platform:
    <input class="plat_check" id="check_pc" name="platform" type="radio" value="PC">PC
    <input class="plat_check" id="check_xbox" name="platform" type="radio" value="XBOX">XBOX
    <input class="plat_check" id="check_switch" name="platform" type="radio" value="SWITCH">SWITCH
    <input class="plat_check" id="check_all" name="platform" type="radio" value="ALL">ALL
    <!-- <input id="check_submit" type="button" value="submit"> -->
</form>
<div id="gameList">
    <?php

$query = "SELECT * FROM games";

$result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_array($result)) {

    echo "<figure>";
    echo "<a href='gameInfo.php?id=" . $row['gameID'] . "'><img src='" . $row['imageURL'] . "' alt='no'></a>";
    echo "<figcaption>" . $row['gameName'] . "</figCaption>";

    echo "<figcaption class='addtocart'><a href='filter.php?id=" . $row['gameID'] . "' role='button'> Add to Cart</a></figcaption>";
    echo "<figcaption>Price: " . $row['price'] . "</figcaption>";
    echo "</figure>";

}

?>
</div>

<script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
<script type="text/javascript">

  $(function(){
      $('select').on('change', function(){
        $(".plat_check").prop("checked", false);

          var gameCate=$('#genreList option:selected').val();

          $.ajax({
              method:"POST",
              url: "filter_ajax.php",
              data:{"genre": gameCate},

          }).done(function(result){
            var result_array=$.parseJSON(result);

            //alert(result_array);
            //alert(result_array);
            var string="";
               $.each( result_array, function( key, value ) {
                string+="<figure>";
                string+="<a href='gameInfo.php?id=" + value['gameID'] + "'><img src='" + value['imageURL'] + "' alt='no'></a>";
                string+= "<figcaption>" + value['gameName'] + "</figCaption>";
                string+= "<figcaption class='addtocart'><a href='filter.php?id=" + value['gameID'] + "' role='button'> Add to Cart</a></figcaption>";
                string+= "<figcaption>Price: "+value['price']+"</figcaption>";
                string+="</figure>";
             });

            $('#gameList').html(string);
            //alert(string);
      });
    });
  });


  $(function(){


    $(".plat_check").on('change', function(){
       //var str=$("form").serialize();
       
       var gameCate=$('#genreList option:selected').val();

        var data = $(".plat_check").serialize();

        console.log(data);
        $.ajax({
            method:"POST",
            url: "filter_ajax_test.php",
            //data: {"check_array":data},
            data: data+"&gameCate="+gameCate,
        }).done(function(result){
            
            var query=$.parseJSON(result);
            //alert(result);
            //alert(query);
            //alert(query);
            var string="";
               $.each( query, function( key, value ) {
                string+="<figure>";
                 string+="<a href='gameInfo.php?id=" + value['gameID'] + "'><img src='" + value['imageURL'] + "' alt='no'></a>";
                 string+= "<figcaption>" + value['gameName'] + "</figCaption>";
                 string+= "<figcaption class='addtocart'><a href='filter.php?id=" + value['gameID'] + "' role='button'> Add to Cart</a></figcaption>";
                 string+= "<figcaption>Price: "+value['price']+"</figcaption>";
                 string+="</figure>";
             });

            $('#gameList').html(string);
        });
    });
  });



</script>

<?php
if (isset($_POST['submit'])) {
    if (isset($_POST['genreList'])) {
        $_SESSION['genre'] = $_POST['genreList'];
        //echo $_SESSION['genre'];
        //header('location:filter.php');
    }
} else {
    //defualt;
    $_SESSION['genre'] = "fps";
    //header('location:filter.php');
}

/*
$query = "SELECT * FROM games WHERE genre='" . $_SESSION['genre'] . "'";
//$query = "SELECT * FROM cart WHERE genre='adventure'";
// echo $query;
//$query = "SELECT* FROM cart";
$result = mysqli_query($connection, $query);
// if ($result) {
//     echo "success";
// } else {
//     echo "fail";
// }

echo "<div class='gameList'>";
while ($row = mysqli_fetch_array($result)) {

// foreach($row as $value){
// echo "<img src='". $value."' alt='no'>";
// }
echo "<figure>";
echo "<a href='gameInfo.php?id=" . $row['gameID'] . "'><img src='" . $row['imageURL'] . "' alt='no'></a>";
echo "<figcaption>" . $row['gameName'] . "</figCaption>";

echo "<figcaption><a href='filter.php?id=" . $row['gameID'] . "' role='button'> Add to Cart</a></figcaption>";
echo "</figure>";
//echo $row['gameName'];
}
echo "</div>";
//} else {
//}
 */

if (isset($_SESSION['valid_user'])) {
    if (isset($_GET['id']) & !empty($_GET['id'])) {
        if (isset($_SESSION['cart']) & !empty($_SESSION['cart'])) {

            $items = $_SESSION['cart'];
            $cartitems = explode(",", $items);
            if (in_array($_GET['id'], $cartitems)) {
                //header('location: index.php?status=incart');
                //echo "already in cart!";
                echo '<script language="javascript">';
                echo 'alert("Already in cart!")';
                echo '</script>';
            } else {
                $items .= "," . $_GET['id'];
                $_SESSION['cart'] = $items;
            }

        } else {
            $items = $_GET['id'];
            $_SESSION['cart'] = $items;
            //header('Location: addtocart.php?');     
            //echo "you have added" . $_SESSION['cart'];
        }
    }
} else {
    //echo "you have to login first";
}

if (isset($_GET['id']) & !isset($_SESSION['valid_user'])) {
    echo '<script language="javascript">';
    echo 'alert("You have to login first!")';
    echo '</script>';
}

?>


<?php echo file_get_contents("footer.html"); ?>

</body>
</html>
