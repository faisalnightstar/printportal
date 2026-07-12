<?Php


$Server = 'localhost';
$username = 'skprintt_ports';
$password = 'skprintt_ports';


//$Server = 'localhost';
//$username = 'root';
//$password = '';

$database = 'skprintt_ports';

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