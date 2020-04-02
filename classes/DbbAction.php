<?php
class DbbAction 
{
    public function callAction($route) 
    {
        include_once __DIR__ . '/../includes/DatabaseConnection.php';
        include_once __DIR__ . '/../classes/DatabaseTable.php';

        $booksTable = new DatabaseTable($pdo, 'dbb.libro', 'id_libro');
        $authorsTable = new DatabaseTable($pdo, 'dbb.autore', 'idautore');
        $editorsTable = new DatabaseTable($pdo, 'dbb.editore', 'nome');

        switch ($route) {
            case 'book/home':
                include __DIR__ . '/controllers/BookController.php';
                $controller = new BookController($booksTable, $authorsTable, $editorsTable);
                $page = $controller->home();
            break;
            case 'book/list':
                include __DIR__ . '/controllers/BookController.php';
                $controller = new BookController($booksTable, $authorsTable, $editorsTable);
                $page = $controller->list();
            break;
            case 'book/delete':
                include __DIR__ . '/controllers/BookController.php';
                $controller = new BookController($booksTable, $authorsTable, $editorsTable);
                $page = $controller->delete();
            break;
            case 'book/edit':
                include __DIR__ . '/controllers/BookController.php';
                $controller = new BookController($booksTable, $authorsTable, $editorsTable);
                $page = $controller->edit();
            break;
        }

        return $page;
    }
}
?>