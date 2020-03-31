<?php
include_once __DIR__ . '/classes/DatabaseTable.php';
include_once __DIR__ . '/includes/DatabaseConnection.php';
$bookTable = new DatabaseTable($pdo, 'dbb.libro', 'id_libro');
try {
    if (isset($_POST['book'])) {
        $fields = $_POST['book'];
        $bookTable->save($fields);
        header('location: bookslist.php');
    } else {
        $title = 'Edit Book';
        $autorTable = new DatabaseTable($pdo, 'dbb.autore', 'idautore');
        $editorTable = new DatabaseTable($pdo, 'dbb.editore', 'nome');
        if (isset($_GET['id'])) {
            $book = $bookTable->findById($_GET['id']);
        }
        $autori = $autorTable->findAll();
        $editori = $editorTable->findAll();
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