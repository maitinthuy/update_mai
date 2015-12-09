<?php
$mod = isset($_GET["mod"])?$_GET["mod"]:"";
if($mod == "delete")
{
	include "delete.php";
}


?>