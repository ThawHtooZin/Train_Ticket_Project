<?php

include 'config/connect.php';

session_start();

$reply = $_POST['reply'];
$id = $_GET['id'];
$stmt = $pdo->prepare("UPDATE feedback SET responce=:reply WHERE id=$id");
$stmt->execute(
  array(':reply' => $reply)
);

if($stmt){
  echo "<script>alert('Replied Successfully!'); window.location.href='feedback.php';</script>";
}

?>
