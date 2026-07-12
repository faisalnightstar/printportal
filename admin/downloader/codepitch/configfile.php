<?php
/* Database configuration */
define('DB_HOST','localhost');
$username = "u964961549_farook";
$password = 'Nidiprint@12';
define('DB_NAME','u929844834_sevicep');




/* site hash */
define('SITE_HASH','4223AC45D4A9166932EE2262A4956');
function print_a($arr)
{
	echo '<pre>';
	print_r($arr);
	echo '</pre>';
}

function asset_url($url)
{
	return 'https://printportals.xyz/admin/'.$url;
}