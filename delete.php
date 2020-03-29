<?php
include_once __DIR__ . '/includes/DatabaseFunction.php';
try {
  include_once __DIR__ . '/includes/DatabaseConnection.php';
  //cancellazione record
  remove($pdo,'dbb.libro','id_libro',$_POST['ID']);
  //reindirizzo verso booklist
  header('location: bookslist.php');
} catch (PDOException $e) {
  $title = 'An error has occurred';
  $output = 'Unable to connect to the database server: ' . $e->getMessage() . " in " . $e->getFile() . ": " . $e->getLine();
}
include __DIR__ . '/layout/layout.html.php';
 ?>
