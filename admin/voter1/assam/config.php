<?Php

$Server = 'localhost';
$username = 'u169352913_vikas';
$password = 'Adprint@123';

//$Server = 'localhost';
//$username = 'root';
//$password = '';

$database = 'u169352913_vikas';


//$database = 'u135243656_arjun';

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