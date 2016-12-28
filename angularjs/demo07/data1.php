<?php
	$text=file_get_contents('php://input',true);
	//var_dump($postData);
	//$text=$_POST['text'];
	$name=$_GET['name'];
	
	echo $name.$text.'_post';