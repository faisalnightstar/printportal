<?Php


$Server = 'localhost';
$username = 'mybestpr_my';
$password = 'mybestpr_my';


//$Server = 'localhost';
//$username = 'root';
//$password = '';

$database = 'mybestpr_my';

//$database = 'mybestpr_my';

//echo $Server;
$connection = mysqli_connect($Server,$username,$password);

if($connection)
{
    mysqli_select_db($connection,$database);
}
else
{
    echo "Could not connect to server";
}

?>