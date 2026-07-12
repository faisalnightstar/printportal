<?Php

$Server = 'localhost';
$username = 'aepspe_printportals';
$password = 'aepspe_printportals';

//$Server = 'localhost';
//$username = 'root';
//$password = '';

$database = 'aepspe_printportals';


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