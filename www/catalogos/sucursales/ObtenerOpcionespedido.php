<?php
/*======================= INICIA VALIDACIÓN DE SESIÓN =========================*/

require_once("../../clases/class.Sesion.php");
//creamos nuestra sesion.
$se = new Sesion();


if(!isset($_SESSION['se_SAS']))
{
	/*header("Location: ../../login.php"); */ echo "login";

	exit;
}


require_once("../../clases/conexcion.php");
require_once("../../clases/class.Opcionespedido.php");
require_once("../../clases/class.Funciones.php");

//Se crean los objetos de clase
$db = new MySQL();
$emp = new Opcionespedido();
$f = new Funciones();
$emp->db=$db;

try {

	$obteneropciones=$emp->ObtOpcionespedidoActivos();

	$vrespuesta['respuesta']=$obteneropciones;

	echo json_encode($vrespuesta);

}catch(Exception $e)
{
	$db->rollback();
	echo "Error. ".$e;
}
?>