<?php
try{
	$pdo=new PDO('mysql:host=localhost;dbname=bloodbank','root','');
	session_start();
	$message=$_POST[message];
	$name=$_POST[name];
	$email=$_POST[email];
	$subject=$_POST[subject];
	$insert=$pdo->prepare("insert into contact(message,name,email,subject) values (:message,:name,:email,:subject)");
	$insert->bindParam(':message',$message);
	$insert->bindParam(':name',$name);
	$insert->bindParam(':email',$email);
	$insert->bindParam(':subject',$subject);
	$insert->execute();
}catch(PDOException $f){
	echo $f->getMessage();
}
header('location:index.html');
?>