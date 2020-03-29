<?php
include_once __DIR__ . '/includes/DatabaseFunction.php';
$title = "Booklist";
try {
  include_once __DIR__ . '/includes/DatabaseConnection.php';
  //esecuzione query
  $result = findAll($pdo,'dbb.libro');
  ob_start();
  include __DIR__ . '/templates/visualizza.html.php';
  $output = ob_get_clean();
} catch (PDOException $e) {
  //errori in caso di eccezione
  $title = 'An error has occurred';
  $output = 'Unable to connect to the database server: <br />' . $e->getMessage() . ' in ' . $e->getFile() .
   ': ' . $e->getLine();
}
include __DIR__ . '/layout/layout.html.php';
 ?>
