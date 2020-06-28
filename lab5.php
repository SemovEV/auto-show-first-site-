<?php
    session_start();
    
	include "mylib5.php";
    $count = count($_POST);
    if ($count > 0){
        if (!isset($_POST['submit'])){
            mycalc5($_POST);
            exit;
        }
        else{
            require 'index.php';
            exit;
        }
    }
    else{
        require 'index.php';
        exit;
    }
?>
