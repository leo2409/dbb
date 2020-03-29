<?php
include_once __DIR__ . '/includes/DatabaseFunction.php';
$title = 'bibiolteca: add book';
try {
  include_once __DIR__ . '/includes/DatabaseConnection.php';
  //controllo del form
  $error = true;
  $required = array('titolo','prezzo','data','autore','editore');
  foreach ($required as $value) {
    if (empty($_POST[$value])) {
      $error = false;
    }
  }
  if ($error) {
    //add record
    insertBook($pdo,$_POST['titolo'],$_POST['prezzo'],$_POST['data'],$_POST['autore'],
    $_POST['editore']);
    //reindirizzamento a booklist
    header('location: bookslist.php');
  } else {
    $sql = 'SELECT * FROM dbb.editore';
    $n_editori = $pdo->query($sql);
    ob_start();
    include __DIR__ . '/templates/add_form.html.php';
    $output = ob_get_clean();
  }
} catch (PDOException $e) {
  $title = 'An error has occurred';
  $output = 'the operation was not successful: <br/>' . $e->getMessage() . ' in ' . $e->getFile() . ': ' . $e->getLine();
}
include __DIR__ . '/layout/layout.html.php';
 ?>
