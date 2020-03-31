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
    update($pdo,'dbb.libro','id_libro', ['titolo' => $_POST['titolo'], 'prezzo' => $_POST['prezzo'], 'd_pubblicazione' => $_POST['data'], 'idautore' => $_POST['autore'], 'editore' => $_POST['editore'], 'id_libro' => $_POST['ID']]);
    header('location: bookslist.php');
  } else {
    $title = 'Book Edit';
    //query select
    $book = findById($pdo,'dbb.libro','id_libro',$_POST['id']);
    $n_editori = findAll($pdo,'dbb.editore');
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
