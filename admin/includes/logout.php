<?php 

ob_start();
session_start();

if($_SESSION['user_role'] == 0){
	session_unset();
	session_destroy();
	header('Location: ../../index.php');
}else{
	session_unset();
	session_destroy();
	header('Location: ../index.php');
}
ob_end_flush();