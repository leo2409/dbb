<?php
$title = 'bibiolteca: database';
if (isset($_POST['titolo']) and isset($_POST['prezzo']) and isset($_POST['data'])) {
    try {
      //connessione al database
      $pdo = new PDO('mysql:host=localhost:3335;dbname=dbb;charset=utf8','leo','Natyleo6901');
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      //add record
      $sql = 'INSERT INTO dbb.libro SET
        titolo = :title,
        prezzo = :prezzo,
        d_pubblicazione = :data; ';
      $stmt = $pdo->prepare($sql);
      $stmt->bindValue(':title', $_POST['titolo']);
      $stmt->bindValue(':prezzo', $_POST['prezzo']);
      $stmt->bindValue(':data', $_POST['data']);
      $stmt->execute();
      $addrecord = "the operation was successful";
    } catch (PDOException $e) {
      $addrecord = 'the operation was not successful: <br/>' . $e->getMessage() . ' in ' . $e->getFile() . ': ' . $e->getLine();
    }
}
try {
  //connessione al database
  $pdo = new PDO('mysql:host=localhost:3335;dbname=dbb;charset=utf8','leo','Natyleo6901');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //esecuzione query
  $sql =
      'SELECT * FROM dbb.libro;';
  $result = $pdo->query($sql);
  foreach ($result as $row) {
    $books[] = $row['titolo'] . ' ' . $row['prezzo'] . ' ' . $row['d_pubblicazione'];
  }
} catch (PDOException $e) {
  //errori in caso di eccezione
  $error = 'Unable to connect to the database server: <br />' . $e->getMessage() . ' in ' . $e->getFile() .
   ': ' . $e->getLine();
}
ob_start();
include __DIR__ . '/template/database.html.php';
$output = ob_get_clean();
include __DIR__ . '/template/layout.html.php';
 ?>
