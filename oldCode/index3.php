<?php
function loadTemplate($templateFileName, $variables = []) {
    extract($variables);
    ob_start();
    include __DIR__ . '/templates/' . $templateFileName;
    return ob_get_clean();
}
// $_GET['route] al cui interno 'joke/list'
try {
    include_once __DIR__ . '/includes/DatabaseConnection.php';
    include_once __DIR__ . '/classes/DatabaseTable.php';

    $booksTable = new DatabaseTable($pdo, 'dbb.libro', 'id_libro');
    $authorsTable = new DatabaseTable($pdo, 'dbb.autore', 'idautore');
    $editorsTable = new DatabaseTable($pdo, 'dbb.editore', 'nome');

    $route = $_GET['route'] ?? 'book/home';

    if ($route == strtolower($route)) {
        switch ($route) {
            case 'book/home':
                include __DIR__ . '/classes/controllers/BookController.php';
                $controller = new BookController($booksTable, $authorsTable, $editorsTable);
                $page = $controller->home();
            break;
            case 'book/list':
                include __DIR__ . '/classes/controllers/BookController.php';
                $controller = new BookController($booksTable, $authorsTable, $editorsTable);
                $page = $controller->list();
            break;
            case 'book/delete':
                include __DIR__ . '/classes/controllers/BookController.php';
                $controller = new BookController($booksTable, $authorsTable, $editorsTable);
                $page = $controller->delete();
            break;
            case 'book/edit':
                include __DIR__ . '/classes/controllers/BookController.php';
                $controller = new BookController($booksTable, $authorsTable, $editorsTable);
                $page = $controller->edit();
            break;
        }
    } else {
        http_response_code(301);
        header('location: index.php?route=' . strtolower($route));
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