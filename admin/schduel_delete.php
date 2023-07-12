<?php
include 'config/connect.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM schduel WHERE id=$id");
$stmt->execute();

if($stmt){
  echo "<script>alert('Deleted Successfully!'); window.location.href='schduel.php'</script>";
}
?>
