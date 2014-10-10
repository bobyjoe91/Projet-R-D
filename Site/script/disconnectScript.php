<?php

session_start();

include('../config/config.php');

//supression des variables de sessions
if (isset ($_SESSION['teachLogin']) || isset($_SESSION['studyLogin']))
{
	session_destroy();
	header('Location: ../index.php');
}

//suppression des cookies prof et etudiant
else if (isset ($_COOKIE['teachLogin']) && isset($_COOKIE['studyLogin']))
{
	if ($_COOKIE['teachLogin']!="")
	{
		setcookie('teachLogin', "", time() - 365*24*3600); 
	}
	else if ($_COOKIE['studyLogin']!="")
	{
		setcookie('studyLogin', "", time() - 365*24*3600); 
	}
	header('Location: ../index.php');
}

?>