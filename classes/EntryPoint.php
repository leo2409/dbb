<?php
class EntryPoint
{
    private $route;

    public function __construct($route) 
    {
        $this->route = $route;
        $this->checkUrl();
    }

    private function checkUrl() 
    {
        if ($this->route !== strtolower($this->route)) {
            http_response_code(301);
            header('location: ' . strtolower($this->route));
        }
    }

    private function loadTemplate($templateFileName, $variables = []) 
    {
        extract($variables);
        ob_start();
        include __DIR__ . '/../templates/' . $templateFileName;
        return ob_get_clean();
    }

    private function callAction() 
    {
        include_once __DIR__ . '/../includes/DatabaseConnection.php';
        include_once __DIR__ . '/../classes/DatabaseTable.php';

        $booksTable = new DatabaseTable($pdo, 'dbb.libro', 'id_libro');
        $authorsTable = new DatabaseTable($pdo, 'dbb.autore', 'idautore');
        $editorsTable = new DatabaseTable($pdo, 'dbb.editore', 'nome');

        if ($this->route == strtolower($this->route)) {
            switch ($this->route) {
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
        } else {
            http_response_code(301);
            header('location: index.php?route=' . strtolower($this->route));
        }

        return $page;
    }

    public function run() 
    {
        $page = $this->callAction();

        $title = $page['title'];

        if (isset($page['variables'])) {
            $output = $this->loadTemplate($page['template'],$page['variables']);
        } else {
            $output = $this->loadTemplate($page['template']);
        }
        
        include __DIR__ . '/../layout/layout.html.php';
    }
}
?>