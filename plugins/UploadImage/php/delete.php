<?php
session_start();

require_once('../../../connections/accessDB.php');

$output_dir = "../../../img/produtos/";

if(isset($_POST["op"]) && $_POST["op"] == "delete" && isset($_POST['name']))
{
	$fileName = $_POST['name'];
	 // "p".$codProduto."_".$originalName;

	//$fileName=str_replace("..",".",$fileName); //required. if somebody is trying parent folder files	
	$filePath = $output_dir. $fileName;
	if (file_exists($filePath)) 
	{
        unlink($filePath);

        $codProduto = $_SESSION["cad_codProduto"];
        $con->query("DELETE FROM produto_imagem WHERE codProduto = $codProduto AND local = '$fileName'") or die (mysqli_error($con));
    }
	echo "Deleted File ".$fileName."<br>";
}

?>