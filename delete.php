<?php
include_once __DIR__ . '/classes/DatabaseTable.php';
include_once __DIR__ . '/includes/DatabaseConnection.php';
$bookTable = new DatabaseTable($pdo, 'dbb.libro', 'id_libro');
try {
  //cancellazione record
  $bookTable->remove($_GET['id']);
  //reindirizzo verso booklist
  header('location: bookslist.php');
} catch (PDOException $e) {
  $title = 'An error has occurred';
  $output = 'Unable to connect to the database server: ' . $e->getMessage() . " in " . $e->getFile() . ": " . $e->getLine();
}
include __DIR__ . '/layout/layout.html.php';
 ?>
