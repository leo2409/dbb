<?php
include_once __DIR__ . '/includes/DatabaseFunction.php';
include_once __DIR__ . '/includes/DatabaseConnection.php';
try {
    if (isset($_POST['book'])) {
        $fields = $_POST['book'];
        save($pdo,$fields,'dbb.libro','id_libro');
        header('location: bookslist.php');
    } else {
        $title = 'Edit Book';
        if (isset($_GET['id'])) {
            $book = findById($pdo,$_GET['id'],'dbb.libro','id_libro');
        }
        $autori = findAll($pdo,'dbb.autore');
        $editori = findAll($pdo,'dbb.editore');
        ob_start();
        include __DIR__ . '/templates/bookForm.html.php';
        $output = ob_get_clean();
    }
}catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'the operation was not successful: <br/>' . $e->getMessage() . ' in ' . $e->getFile() . ': ' . $e->getLine();
}
include __DIR__ . '/layout/layout.html.php';
?>