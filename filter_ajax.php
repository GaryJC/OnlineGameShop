<?php
require 'databaseConnect.php';

if(isset($_POST['genre'])&$_POST['genre']!="ALL"){
    $genre=$_POST['genre'];
    $query = "SELECT * FROM games WHERE genre='" . $genre . "'";
}

if(isset($_POST['genre'])&$_POST['genre']=="ALL"){
    $query = "SELECT * FROM games";
}

$result = mysqli_query($connection, $query);

$result_array=array();

 while ($row = mysqli_fetch_array($result)) {


          array_push($result_array, $row);
 }

echo json_encode($result_array);
//$conn->close();
?>