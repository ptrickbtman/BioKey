<?php

include '../controller/boletaBD.php';
include '../controller/clienteBD.php';
include '../controller/direccionBD.php';
include '../controller/metPagBD.php';
include '../controller/regionBD.php';
include '../controller/ventaBD.php';
include '../controller/cerraduraBD.php';

session_start();

if(isset($_POST["IdBoleta"]) && $_SESSION["usuario"][4]==2){
	$jsonFinal ="";
	$json ="";

	$obj = new boletaBD($_POST["IdBoleta"] , null , null, null , null , null ,null, null);
	$json= $obj->verAIdBoletas();

	$jsonFinal = $json;

	$obj = new clienteBD($jsonFinal[0]->RUT_CLI, null, null, null, null, null);
	$json= $obj->buscarClientePorId();

	$jsonFinal[0]->RUT_CLI = $json[0]->RUT_CLI;
	$jsonFinal[0]->NOM_CLI = $json[0]->NOM_CLI;
	$jsonFinal[0]->APE_CLI = $json[0]->APE_CLI;
	$jsonFinal[0]->CORR_CLI = $json[0]->CORR_CLI;
	$jsonFinal[0]->TEL_CLI = $json[0]->TEL_CLI;

	$obj = new direccionBD(null, $jsonFinal[0]->ID_BOL,null,null,null,null,null,null,null,null, null);
	$json= $obj->buscarDirPorIdBol();

	$jsonFinal[0]->ID_DIR = $json[0]->ID_DIR;
	$jsonFinal[0]->ID_BOL  = $json[0]->ID_BOL ;
	$jsonFinal[0]->ID_REGION  = $json[0]->ID_REGION ;
	$jsonFinal[0]->COMUNA_DIR = $json[0]->COMUNA_DIR;
	$jsonFinal[0]->CALL1_DIR = $json[0]->CALL1_DIR;
	$jsonFinal[0]->CALL2_DIR = $json[0]->CALL2_DIR;
	$jsonFinal[0]->NUM_DIR = $json[0]->NUM_DIR;
	$jsonFinal[0]->VILLA_DIR = $json[0]->VILLA_DIR;
	$jsonFinal[0]->BLOCK_DIR = $json[0]->BLOCK_DIR;

	$obj = new metodoPagoBD($jsonFinal[0]->ID_METPAG ,null,null);
	$json= $obj->buscarMetPorId();

	$jsonFinal[0]->NOM_METPAG = $json[0]->NOM_METPAG;


	$obj = new regionBD($jsonFinal[0]->ID_REGION ,null,null);
	$json= $obj->buscarRegPorId();

	$jsonFinal[0]->NOM_REGION = $json[0]->NOM_REGION;

	$obj = new ventaBD(null, null, $jsonFinal[0]->ID_BOL ,null,null);
	$ventas= $obj->buscarVentPorIdBol();

	
	for ($i=0; $i <count($ventas) ; $i++) { 
		$obj = new cerraduraBD($ventas[$i]->COD_CERR , null, null, null, null, null,null, null);
		$json= $obj->cerraduraPorId();
		//$jsonFinal[$i]->COD_CERR = $json[$i]->COD_CERR;
		array_push($jsonFinal, $json);
		
	}
	//echo $jsonFinal[1][0]->SERIAL_CERR;
	echo json_encode($jsonFinal);
}

?>