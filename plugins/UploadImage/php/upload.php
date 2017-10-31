<?php
session_start();

require_once('../../../conn/accDB.php');

$output_dir = "../../../img/seminovos/";
if(isset($_FILES["myfile"]))
{
	$ret = array();
	
//	This is for custom errors;	
/*	$custom_error= array();
	$custom_error['jquery-upload-file-error']="File already exists";
	echo json_encode($custom_error);
	die();
*/
	$error =$_FILES["myfile"]["error"];
	//You need to handle  both cases
	//If Any browser does not support serializing of multiple files using FormData() 
	if(!is_array($_FILES["myfile"]["name"])) //single file
	{
		//$codProduto = $_SESSION["cad_codProduto"];

 	 	$originalName = $_FILES["myfile"]["name"];
 	 	//$fileName = "p".$codProduto."_".$originalName;
 	 	$fileName = $originalName;
 	 	$foto = $originalName;


 		move_uploaded_file($_FILES["myfile"]["tmp_name"],$output_dir.$fileName);
    	$ret[]= $fileName;

    	if(isset($_SESSION["temp_codCar"]))
    	{
    		$codProduto = $_SESSION["temp_codCar"];
    		$con->query("INSERT INTO seminovo_foto (codCarro, titulo) VALUES ($codProduto, '$foto')") or die (mysqli_error($con));

    	}

    	// INSERIR NO BANCO
	}
	else  //Multiple files, file[]
	{
	  $fileCount = count($_FILES["myfile"]["name"]);
	  for($i=0; $i < $fileCount; $i++)
	  {
	  	//$codProduto = $_SESSION["cad_codProduto"];

	  	$originalName = $_FILES["myfile"]["name"];
 	 	$fileName = $originalName;
 	 	$foto = $fileName;


		move_uploaded_file($_FILES["myfile"]["tmp_name"][$i],$output_dir.$fileName);
	  	$ret[]= $fileName;

	  	// INSERIR NO BANCO
	  	if(isset($_SESSION["temp_codCar"]))
    	{
    		$codProduto = $_SESSION["temp_codCar"];
    		$con->query("INSERT INTO seminovo_foto (codCarro, titulo) VALUES ($codProduto, '$foto')") or die (mysqli_error($con));

    	}


	  }
	
	}
    echo json_encode($ret);
 }
 ?>