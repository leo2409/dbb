<?php
try {
  //connessione vdatabase
  $pdo = new PDO('mysql:host=localhost:3335;dbname=dbb;charset=utf8','leo','Natyleo6901');
  $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  //cancellazione record
  $sql = 'DELETE FROM dbb.libro WHERE id_libro = :id';
  $pquery = $pdo->prepare($sql);
  $pquery->bindValue(':id',$_POST['ID']);
  $pquery->execute();
  //reindirizzo verso booklist
  header('location: bookslist.php');
} catch (PDOException $e) {
  $output = 'Unable to connect to the database server: ' . $e->getMessage() . " in " . $e->getFile() . ": " . $e->getLine();
}
include __DIR__ . '/template/layout.html.php';
 ?>
