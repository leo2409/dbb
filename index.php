<?php
function loadTemplate($templateFileName, $variables = []) {
    extract($variables);
    ob_start();
    include __DIR__ . '/templates/' . $templateFileName;
    return ob_get_clean();
}

try {
    include_once __DIR__ . '/includes/DatabaseConnection.php';
    include_once __DIR__ . '/classes/DatabaseTable.php';
    include_once __DIR__ . '/controllers/BookController.php';
    $booksTable = new DatabaseTable($pdo, 'dbb.libro', 'id_libro');
    $authorsTable = new DatabaseTable($pdo, 'dbb.autore', 'idautore');
    $editorsTable = new DatabaseTable($pdo, 'dbb.editore', 'nome');
    $bookController = new BookController($booksTable, $authorsTable, $editorsTable);

    $action = $_GET['action'] ?? 'home';

    if ($action == strtolower($action)) {
        $page = $bookController->$action();
    } else {
        http_response_code(301);
        header('location: index.php?action=' . strtolower($action));
    }
    
    $title = $page['title'];

    if (isset($page['variables'])) {
        $output = loadTemplate($page['template'], $page['variables']);
    } else {
        $output = loadTemplate($page['template']);
    }
    
    } catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'the operation was not successful: <br/>' . $e->getMessage() . ' in ' . $e->getFile() . ': ' . $e->getLine();
}
include __DIR__ . '/layout/layout.html.php';
?>