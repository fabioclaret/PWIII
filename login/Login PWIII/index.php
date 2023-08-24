<?php
session_start();
if($_SESSION['email']){
	require 'Usuario.class.php';
	echo "Bem vindo ".$_SESSION['nome'];	
}else{
	echo"<script>alert('Voce nao esta logado')</script>";
	header("location:login.php");
}
