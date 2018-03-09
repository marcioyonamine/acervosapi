<?php 

/*
É preciso que estejam habilitados

[Windows]
extension=php_oci8.dll
extension=php_oracle.dll

[Linux]
extension=oci8.so
*/

function conOracle(){
	include "db.php";

	$dbstr = "(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST = $domain)(PORT = $port))
	(CONNECT_DATA = 
	(SERVER = DEDICATED)
	(SERVICE_NAME = $service)
	(INSTANCE_NAME = $instance)))";

	$conn = oci_connect($hr,$hr_password,$dbstr);

	return $conn;
}