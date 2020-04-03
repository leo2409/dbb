<?php
namespace Dbb\Controllers;

class Book {
    private $booksTable;
    private $authorsTable;
    private $editorsTable;

    public function __construct(\LFramework\DatabaseTable $booksTable, \LFramework\DatabaseTable $authorsTable, \LFramework\DatabaseTable $editorsTable) {
        $this->booksTable = $booksTable;
        $this->authorsTable = $authorsTable;
        $this->editorsTable = $editorsTable;
    }

    public function list() {
        $title = "Book list";
        $books = [];
        $books = $this->booksTable->findAll();
        return [
            'template' => 'books.html.php',
            'title' => $title, 
            'variables' => [
                'books' => $books ?? NULL,
            ],
        ];
    }

    public function home() {
        $title = 'Home';
        return ['template' => 'home.html.php', 'title' => $title];
    }

    public function delete() {
        $this->booksTable->remove($_POST['id']);
        header('location: index.php?route=book/list');
    }

    public function edit() {
        if (isset($_POST['book'])) {
            $fields = $_POST['book'];
            $this->booksTable->save($fields);
            header('location: index.php?route=book/list');
        } else {
            $title = 'Edit Book';
            if (isset($_POST['id'])) {
                $book = $this->booksTable->findById($_POST['id']);
            }
            $autori = $this->authorsTable->findAll();
            $editori = $this->editorsTable->findAll();
            return [
                'title' => $title, 
                'template' => 'bookForm.html.php', 
                'variables' => [
                    'book' => $book ?? NULL, 
                    'autori' => $autori ?? NULL, 
                    'editori' => $editori ?? NULL,
                ],
            ];
        }
    }
}
?>