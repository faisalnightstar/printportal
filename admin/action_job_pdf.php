<?php
error_reporting(0);

if (file_exists(__DIR__ . '/config.php')) {
    include_once(__DIR__ . '/config.php');
} elseif (file_exists(__DIR__ . '/../config.php')) {
    include_once(__DIR__ . '/../config.php');
} elseif (file_exists(__DIR__ . '/../../config.php')) {
    include_once(__DIR__ . '/../../config.php');
} elseif (file_exists(__DIR__ . '/../../../config.php')) {
    include_once(__DIR__ . '/../../../config.php');
}

$id = $_REQUEST['id'];

$updt = mysqli_query($connection,"delete from job_card WHERE id=".$id."") ;

//header("location:backend.php#a".$id); exit();

echo '<script> window.open("Job_Card_hkb_list.php#a'.$id.'","_self"); </script>' ;

?>

