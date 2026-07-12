<?Php include('config.php'); ?>

<?php
error_reporting(0);
include("config.php");

$id = $_REQUEST['aadharmanualid'];

$a = mysqli_query($connection,"SELECT aadharno,imagepathoriginal FROM aadharmanual Where aadharmanualid='".$id."'");
$b = mysqli_fetch_array($a);
unlink("aadhar/imgmanualaadhaar/".$b['imagepathoriginal']);

$updt = mysqli_query($connection,"delete from aadharmanual WHERE aadharmanualid=".$id."") ;

//header("location:backend.php#a".$id); exit();

echo '<script> window.open("aadharmanuallist.php#a'.$id.'","_self"); </script>' ;

?>

