<?php
@$dbcnx = new mysqli('localhost','root','','vivigo');
// @ to ignore error message display //
if ($dbcnx->connect_error){
	echo "Database is not online"; 
	exit;
	// above 2 statments same as die() //
	}
	// else
	// echo "Congratulations...  MySql is working..";

if (!$dbcnx->select_db ("vivigo"))
	exit("<p>Unable to locate the vivigo database</p>");
?>	