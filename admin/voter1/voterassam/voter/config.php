<?Php


$Server = 'localhost';
$username = 'mybestpr_mybest';
$password = 'mybestpr_mybest';


//$Server = 'localhost';
//$username = 'root';
//$password = '';

$database = 'mybestpr_mybest';

//$database = 'mybestpr_mybest';

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