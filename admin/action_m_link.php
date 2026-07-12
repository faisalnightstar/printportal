<?php
error_reporting(0);

include('config.php');

$id = $_REQUEST['id'];

$updt = mysqli_query($connection,"delete from m_link WHERE id=".$id."") ;

//header("location:backend.php#a".$id); exit();

echo '<script> window.open("vote_mob_link_list.php#a'.$id.'","_self"); </script>' ;

?>

