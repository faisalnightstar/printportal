<?Php include('config.php'); ?>

<?php
error_reporting(0);
include("config.php");

$id = $_REQUEST['id'];

$updt = mysqli_query($connection,"delete from dllist WHERE id=".$id."") ;

//header("location:backend.php#a".$id); exit();

echo '<script> window.open("dlmlist.php#a'.$id.'","_self"); </script>' ;

?>

