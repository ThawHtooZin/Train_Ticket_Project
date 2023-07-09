<?php

include 'config/connect.php';

session_start();
$username = $_SESSION['username'];
$userstmt = $pdo->prepare("SELECT * FROM users WHERE username='$username'");
$userstmt->execute();
$userdata =  $userstmt->fetch(PDO::FETCH_ASSOC);


$message = $_POST['message'];
$user = $userdata['id'];
$stmt = $pdo->prepare("INSERT INTO feedback(comment,user) VALUES('$message','$user')");
$stmt->execute();
if($stmt){
  echo "<script>alert('Thanks for the feedback. We will replay between 24 hours!'); window.location.href='feedback.php';</script>";
}

?>
