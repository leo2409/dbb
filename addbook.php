<?php
$title = 'bibiolteca: add book';
try {
  //connessione al database
  $pdo = new PDO('mysql:host=localhost:3335;dbname=dbb;charset=utf8','leo','Natyleo6901');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //controllo del form
  if (!empty($_POST['titolo']) && !empty($_POST['prezzo']) && !empty($_POST['data']) && !empty($_POST['editore']) && !empty($_POST['autore'])) {
    //add record
    $sql = 'INSERT INTO dbb.libro SET
      titolo = :titolo,
      prezzo = :prezzo,
      d_pubblicazione = :data,
      idautore = :autore,
      editore = :editore; ';
    $pquery = $pdo->prepare($sql);
    $pquery->bindValue(':titolo', $_POST['titolo']);
    $pquery->bindValue(':prezzo', $_POST['prezzo']);
    $pquery->bindValue(':data', $_POST['data']);
    $pquery->bindValue(':autore', $_POST['autore']);
    $pquery->bindValue(':editore', $_POST['editore']);
    $pquery->execute();
    header('location: bookslist.php');
  } else {
    $sql = 'SELECT * FROM dbb.editore';
    $n_editori = $pdo->query($sql);
    ob_start();
    include __DIR__ . '/template/database.html.php';
    $output = ob_get_clean();
  }
} catch (PDOException $e) {
  $output = 'the operation was not successful: <br/>' . $e->getMessage() . ' in ' . $e->getFile() . ': ' . $e->getLine();
}
include __DIR__ . '/template/layout.html.php';

/*
ROBA PER CONTROLLARE ESISTENZA DI ALMENO UN RECORD CON EDITORE
'SELECT COUNT(NOME) FROM dbb.editore WHERE nome = :nome;';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':nome',$_POST['editore']);
$stmt->execute();
$count = $stmt->fetchColumn();
if ($count > 0) {
//add record
$sql = 'INSERT INTO dbb.libro SET
  titolo = :titolo,
  prezzo = :prezzo,
  d_pubblicazione = :data,
  idautore = :autore,
  editore = :editore; ';
$pquery = $pdo->prepare($sql);
$pquery->bindValue(':titolo', $_POST['titolo']);
$pquery->bindValue(':prezzo', $_POST['prezzo']);
$pquery->bindValue(':data', $_POST['data']);
$pquery->bindValue(':autore', $_POST['autore']);
$pquery->bindValue(':editore', $_POST['editore']);
$pquery->execute();
header('location: bookslist.php');
} else {
  //modulo per aggiungere l'editore
  $output = "non esiste alcuna casa editrice con il nome: " . $_POST['editore'];
}
*/
 ?>
