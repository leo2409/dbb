<?php
$title = 'Home';
ob_start();
include_once __dir__ . '/templates/home.html';
$output = ob_get_clean();
include __dir__ . '/layout/layout.html.php';
 ?>
