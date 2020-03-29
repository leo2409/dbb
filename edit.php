<?php
include_once __DIR__ . '/includes/DatabaseFunction.php';
try {
  include_once __DIR__ . '/includes/DatabaseConnection.php';
  //controllo form
  $error = true;
  $required = array('titolo','prezzo','data','autore','editore');
  foreach ($required as $value) {
    if (empty($_POST[$value])) {
      $error = false;
    }
  }
  if ($error) {
    //query update
    editBook($pdo,$_POST['ID'],$_POST['titolo'],$_POST['prezzo'],$_POST['data'],
    $_POST['autore'],$_POST['editore']);
    header('location: bookslist.php');
  } else {
    $title = 'Book Edit';
    //query select
    $book = getBook($pdo,$_POST['ID']);
    $sql = 'SELECT * FROM dbb.editore';
    $n_editori = $pdo->query($sql);
    ob_start();
    include __DIR__ . '/templates/edit_form.html.php';
    $output = ob_get_clean();
  }
} catch (PDOException $e) {
  $title = 'An error has occurred';
  $output = 'Unable to connect to the database server: <br />' . $e->getMessage() . ' in ' .
  $e->getFile() . ': ' . $e->getLine();
}
include __DIR__ . '/layout/layout.html.php';
 ?>
