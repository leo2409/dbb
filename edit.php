<?php
$title = 'Book Edit';
try {
  //connessione al database
  $pdo = new PDO('mysql:host=localhost:3335;dbname=dbb;charset=utf8','leo','Natyleo6901');
  $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  if (!empty($_POST['titolo']) and !empty($_POST['prezzo']) and !empty($_POST['data'])) {
    //query update
    $sql =
    'UPDATE dbb.libro SET
    titolo = :titolo,
    prezzo = :prezzo,
    d_pubblicazione = :data
    WHERE id_libro = :id;';
    $pquery = $pdo->prepare($sql);
    $pquery->bindValue(':titolo', $_POST['titolo']);
    $pquery->bindValue(':prezzo', $_POST['prezzo']);
    $pquery->bindValue(':data', $_POST['data']);
    $pquery->bindValue(':id', $_POST['ID']);
    $pquery->execute();
    header('location: bookslist.php');
  } else {
    //query select
    $sql =
    'SELECT * FROM dbb.libro WHERE id_libro = ' .  $_POST['ID'] . ';';
    $result = $pdo->query($sql);
    $book = $result->fetch();
    ob_start();
    include __DIR__ . '/template/book_edit.html.php';
    $output = ob_get_clean();
  }
} catch (PDOException $e) {
  $output = 'Unable to connect to the database server: <br />' . $e->getMessage() . ' in ' .
  $e->getFile() . ': ' . $e->getLine();
}
include __DIR__ . '/template/layout.html.php';
 ?>
