<?php 
error_reporting(E_ALL);

if (function_exists("oci_connect")) {
    echo "oci_connect found\n";
} else {
    echo "oci_connect not found\n";
    exit;
}

$dbstr = "(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST = 172.30.72.238)(PORT = 1521))
(CONNECT_DATA = 
(SERVER = DEDICATED)
(SERVICE_NAME = pmsa)
(INSTANCE_NAME = pmsa)))";
global $conn;
$conn = oci_connect('scpsa','scpsa',$dbstr,'AL32UTF8');
/* if($conn){
	$e = oci_error();
	trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
	
}
global $conn;

echo "Successful";
error_reporting(2);
*/
echo "<br /><br />";
if(isset($_GET['busca'])){
	$busca = $_GET['busca'];
	//$sql = " WHERE (DS_NOME LIKE '%$busca%') OR (DS_OUTRO_NOME LIKE '%$busca%') OR (DS_TITULO LIKE '%$busca%') OR (DS_LEGENDA  LIKE '%$busca%') OR  (DS_DESCRICAO  LIKE '%$busca%')";  
	$sql = " WHERE DS_DESCRICAO LIKE '%$busca%' ";
}else{
	$sql = "";
}

//$sql_pre = "SELECT DS_NOME, DS_OUTRO_NOME, DS_TITULO, DS_LEGENDA, DS_DESCRICAO FROM MUSEUP.TAB_FICHA_CATALOGRAFICA ";

$sql_pre = "SELECT * FROM MUSEUP.TAB_FICHA_CATALOGRAFICA ";

$teste = oci_parse($conn,$sql_pre.$sql." ORDER BY ID_FICHA_CATALOGRAFICA ASC"); 
$r = oci_execute($teste);
$nrows = oci_fetch_all($teste,$results);
echo "<h1>Foram encontrados ".count($results['DS_NOME'])."</h1>";
echo $sql_pre.$sql."<br />";
echo "<pre>";
var_dump($results);
echo "</pre>";
?>


