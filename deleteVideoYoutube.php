<?php
require_once('config.php');
$idVideo    	 = $_REQUEST['idVideo']; 

$sqlDeleteProd    = ("DELETE FROM videos WHERE  id='" .$idVideo. "'");
$resultProd 	  = mysqli_query($con, $sqlDeleteProd);


header("Location:agregarVideo.php");
exit();

?>
  