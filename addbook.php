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
    insert($pdo,'dbb.libro',['titolo' => $_POST['titolo'], 'prezzo' => $_POST['prezzo'],
    'd_pubblicazione' => $_POST['data'], 'idautore' => $_POST['autore'],
    'editore' => $_POST['editore'],]);
    //reindirizzamento a booklist
    header('location: bookslist.php');
  } else {
    $n_editori = findAll($pdo,'dbb.editore');
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
