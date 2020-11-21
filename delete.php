<?php
	session_start();
	require_once('pdo.php');
	error_reporting(E_ERROR | E_WARNING | E_PARSE);

	if(!isset($_SESSION['username'])){
        header( 'Location: landing.php' ) ;
        return;
    }else{
        $delete_query = "DELETE FROM `dishes` WHERE `id`= :id";
        $stmt = $pdo->prepare($delete_query);
        $status = $stmt->execute(array(
                ':id' => $_GET['id'])
            );
        header("Location: user.php");
        return;
    }
?>