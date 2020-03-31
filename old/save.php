<?php
include_once __DIR__ . '/includes/DatabaseFunction.php';
include_once __DIR__ . '/includes/DatabaseConnection.php';
try {
  if (!empty($_POST['book'])) {
    $error = false;
    $required = ['titolo', 'autore', 'editore'];
    foreach ($required as $value) {
      if (empty($_POST[$value])) {
        $error = true;
      }
    }
    if (!$error) {
      //queri e reindirizzamento a booklist
      $fields = [
        'titolo' => $_POST['titolo'],
        'prezzo' => $_POST['prezzo'],
        'd_pubblicazione' => $_POST['data'],
        'idautore' => $_POST['autore'],
        'editore' => $_POST['editore'],
        'id_libro' => $_POST['id'],
      ];
      update($pdo,'dbb.libro','id_libro',$fields);
      header('location: bookslist.php');
    } else {
      //template per il form
      $title = 'Book Edit';
      $book = findById($pdo,'dbb.libro','id_libro',$_POST['id']);
      $editori = findAll($pdo,'dbb.editore');
      $autori = findAll($pdo,'dbb.autore');
      ob_start();
      include __DIR__ . '/templates/bookForm.html.php';
      $output = ob_get_clean();
    }
  } else {
    $error = false;
    $required = ['titolo', 'autore', 'editore'];
    foreach ($required as $value) {
      if (empty($_POST[$value])) {
        $error = true;
      }
    }
    if (!$error) {
      // query inserimento e reindirizzamento a bookslist
      $fields = [
        'titolo' => $_POST['titolo'],
        'prezzo' => $_POST['prezzo'],
        'd_pubblicazione' => $_POST['data'],
        'idautore' => $_POST['autore'],
        'editore' => $_POST['editore'],
      ];
      insert($pdo,'dbb.libro',$fields);
      header('location: bookslist.php');
    } else {
      $title = 'Add Book';
      $editori = findAll($pdo,'dbb.editore');
      $autori = findAll($pdo,'dbb.autore');
      ob_start();
      include __DIR__ . '/templates/bookForm.html.php';
      $output = ob_get_clean();
    }
  }
} catch (PDOException $e) {
  $title = 'An error has occurred';
  $output = 'the operation was not successful: <br/>' . $e->getMessage() . ' in ' . $e->getFile() . ': ' . $e->getLine();
}
include __DIR__ . '/layout/layout.html.php';
 ?>
