<?php
DEFINE ('DB_USER', 'webuser');
DEFINE ('DB_PASSWORD', 'password');
DEFINE ('DB_HOST', '127.0.0.1');
DEFINE ('DB_NAME', 'text');

$dbc = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die('Could not connect to MYSQL database ' .
		mysql_error());
?>