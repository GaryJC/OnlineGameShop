<?php
require 'databaseConnect.php';

$gameCate=$_POST['gameCate'];

$gamePlat = $_POST['platform'];

if (isset($_POST['platform'])&$gamePlat!="ALL"&$gameCate!="ALL") {
    
    $result_query = "SELECT * FROM games WHERE platform=" . "'$gamePlat'". "AND genre='".$gameCate."'";
}

if (isset($_POST['platform'])&$gamePlat!="ALL"&$gameCate=="ALL") {
    
    $result_query = "SELECT * FROM games WHERE platform='".$gamePlat."'";
}

if (isset($_POST['platform'])&$gamePlat=="ALL"&$gameCate!="ALL") {
    $result_query = "SELECT * FROM games WHERE genre='".$gameCate."'";
}

if (isset($_POST['platform'])&$gamePlat=="ALL"&$gameCate=="ALL") {
    $result_query = "SELECT * FROM games";
}

$str=0;
$result = mysqli_query($connection, $result_query);
if($result){
    $str=1;
}
else{
    $str=2;
}

$result_array=array();

 while ($row = mysqli_fetch_array($result)) {


          array_push($result_array, $row);
 }

echo json_encode($result_array);

?>