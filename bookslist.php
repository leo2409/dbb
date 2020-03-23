<?php
try {
  //connessione al database
  $pdo = new PDO('mysql:host=localhost:3335;dbname=dbb;charset=utf8','leo','Natyleo6901');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //esecuzione query
  $sql =
      'SELECT * FROM dbb.libro;';
  $result = $pdo->query($sql);
  ob_start();
  include __DIR__ . '/template/vdatabase.html.php';
  $output = ob_get_clean();
} catch (PDOException $e) {
  //errori in caso di eccezione
  $output = 'Unable to connect to the database server: <br />' . $e->getMessage() . ' in ' . $e->getFile() .
   ': ' . $e->getLine();
}
include __DIR__ . '/template/layout.html.php';
 ?>
