<?php
if (!defined('WC_BASE')) define('WC_BASE', __DIR__);
$ref=WC_BASE."/index.php";
if ($ref!=$_SERVER['SCRIPT_FILENAME']){
	header("Location: index.php");
	exit();
}
include WC_BASE . "/browse.php";
?>
