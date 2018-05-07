<?php 

function bancoMysqli(){ 
	$servidor = 'localhost';
	$usuario = 'root';
	$senha = '';
	$banco = 'museupostgre';
	$con = mysqli_connect($servidor,$usuario,$senha,$banco); 
	mysqli_set_charset($con,"utf8");
	return $con;
}

function XML2Array($xmlContent, $out = array()){
    //$xmlObject = is_object($xmlContent) ? $xmlContent : simplexml_load_string($xmlContent);
	$xmlObject = simplexml_load_string($xmlContent);

    foreach((array) $xmlObject as $index => $node)
        $out[$index] = ( is_object($node) || is_array($node) ) ? XML2Array( $node ) : $node;
    return $out;
}

$con = bancoMysqli();

$sql = "SELECT * FROM bens";
$query = mysqli_query($con,$sql);

while($x = mysqli_fetch_array($query)){
	$xml = XML2Array($x['conteudo']);
	echo $x['id']."<br />";
	echo "<pre>";
	var_dump($xml);
	echo "</pre>";
}
