<?Php

$Server = 'localhost';
$username = "u964961549_farook";
$password = 'Nidiprint@12';

//$Server = 'localhost';
//$username = 'u169352913_er86444';
//$password = 'Adprint@123';

$database = 'u929844834_sevicep';


//$database = 'u169352913_er86444';

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