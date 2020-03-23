<?php
$title = 'bibiolteca: add book';
if (isset($_POST['titolo']) and isset($_POST['prezzo']) and isset($_POST['data'])) {
    try {
      //connessione al database
      $pdo = new PDO('mysql:host=localhost:3335;dbname=dbb;charset=utf8','leo','Natyleo6901');
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      //add record
      $sql = 'INSERT INTO dbb.libro SET
        titolo = :titolo,
        prezzo = :prezzo,
        d_pubblicazione = :data; ';
      $stmt = $pdo->prepare($sql);
      $stmt->bindValue(':titolo', $_POST['titolo']);
      $stmt->bindValue(':prezzo', $_POST['prezzo']);
      $stmt->bindValue(':data', $_POST['data']);
      $stmt->execute();
      header('location: bookslist.php');
    } catch (PDOException $e) {
      $output = 'the operation was not successful: <br/>' . $e->getMessage() . ' in ' . $e->getFile() . ': ' . $e->getLine();
    }
}
ob_start();
include __DIR__ . '/template/book_edit.html.php';
$output = ob_get_clean();
include __DIR__ . '/template/layout.html.php';
 ?>
