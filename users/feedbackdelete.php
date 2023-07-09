<?php
  include 'config/connect.php';

  $id = $_GET['id'];
  $stmt = $pdo->prepare("DELETE FROM feedback WHERE id=$id");
  $stmt->execute();
  echo "<script>alert('Deleted the feedback successfully!'); window.location.href='feedback.php';</script>";

?>
