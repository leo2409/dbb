<?php
$title = 'Bibliotaca: homepage';
ob_start();
include __dir__ . '/template/home.html';
$output = ob_get_clean();
include __dir__ . '/template/layout.html.php';
 ?>
