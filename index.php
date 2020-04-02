<?php
try {
    include __DIR__ . '/classes/EntryPoint.php';

    $route = $_GET['route'] ?? 'book/home';
    
    $entryPoint = new EntryPoint($route);
    $entryPoint->run();
} catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'the operation was not successful: <br/>' . $e->getMessage() . ' in ' . $e->getFile() . ': ' . $e->getLine();
}
include __DIR__ . '/layout/layout.html.php';
?>