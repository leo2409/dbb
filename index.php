<?php
try {
    include_once __DIR__ . '/includes/AutoLoader.php';
    /*include __DIR__ . '/classes/EntryPoint.php';
    include __DIR__ . '/classes/DbbAction.php';*/

    $route = $_GET['route'] ?? 'book/home';
    
    $entryPoint = new \LFramework\EntryPoint($route, new \Dbb\DbbAction());
    $entryPoint->run();
} catch (\PDOException $e) {
    $title = 'An error has occurred';
    $output = 'the operation was not successful: <br/>' . $e->getMessage() . ' in ' . $e->getFile() . ': ' . $e->getLine();
    include __DIR__ . '/layout/layout.html.php';
}
?>