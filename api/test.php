<?php 
error_reporting(E_ALL);

include "conexao.php";
$con = conOracle();

echo "<br /><br />";
$teste = oci_parse($con,"SELECT * FROM MUSEUP.MENU"); 
$r = oci_execute($teste);
$nrows = oci_fetch_all($teste,$results);
echo "<pre>";
var_dump($results);
echo "</pre>";
?>


