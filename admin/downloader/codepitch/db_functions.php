<?php

function db_connect()
{
	$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
	
	if($conn)
	{
	  return $conn;	
	}
	else
	{
		die("MYSQL CONNECTION ERROR:- ".mysqli_connect_error());
	}
}


function db_close($conn)
{
	
	mysqli_close($conn);
}

?>
