<?Php include('config.php'); ?>

<?php
error_reporting(0);
include("config.php");

$id = $_REQUEST['voterautoid'];

$updt = mysqli_query($connection,"delete from voterauto2 WHERE voterautoid=".$id."") ;

//header("location:backend.php#a".$id); exit();

echo '<script> window.open("voterlist.php#a'.$id.'","_self"); </script>' ;

?>

