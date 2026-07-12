<?Php include('config.php'); ?>

<?php
error_reporting(0);
include("config.php");

$id = $_REQUEST['id'];

$updt = mysqli_query($connection,"delete from voterauto0 WHERE voterautoid=".$id."") ;

//header("location:backend.php#a".$id); exit();

echo '<script> window.open("votermanuallist.php#a'.$id.'","_self"); </script>' ;

?>

