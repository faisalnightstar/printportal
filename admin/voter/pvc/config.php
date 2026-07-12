<?Php

$Server = 'localhost';
$username = 'tepbzfak_pk';
$password = 'Mohanpur0001';

//$Server = 'localhost';
//$username = 'root';
//$password = '';

$database = 'tepbzfak_pk';


//$database = 'print_aadhaar_rishav';

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