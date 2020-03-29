<?php
try {
  include_once __DIR__ . '/includes/DatabaseConnection.php';
  //cancellazione record
  $sql = 'DELETE FROM dbb.libro WHERE id_libro = :id';
  $pquery = $pdo->prepare($sql);
  $pquery->bindValue(':id',$_POST['ID']);
  $pquery->execute();
  //reindirizzo verso booklist
  header('location: bookslist.php');
} catch (PDOException $e) {
  $title = 'An error has occurred';
  $output = 'Unable to connect to the database server: ' . $e->getMessage() . " in " . $e->getFile() . ": " . $e->getLine();
}
include __DIR__ . '/layout/layout.html.php';
 ?>
