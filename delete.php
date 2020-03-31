<?php
include_once __DIR__ . '/includes/DatabaseFunction.php';
include_once __DIR__ . '/includes/DatabaseConnection.php';
try {
  //cancellazione record
  remove($pdo,'dbb.libro','id_libro',$_GET['id']);
  //reindirizzo verso booklist
  header('location: bookslist.php');
} catch (PDOException $e) {
  $title = 'An error has occurred';
  $output = 'Unable to connect to the database server: ' . $e->getMessage() . " in " . $e->getFile() . ": " . $e->getLine();
}
include __DIR__ . '/layout/layout.html.php';
 ?>
