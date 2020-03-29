<?php
include_once __DIR__ . '/../includes/DatabaseFunction.php';
include_once __DIR__ . '/../includes/DatabaseConnection.php';

function updateBooks($pdo,$fields) {
  $sql = 'UPDATE dbb.libro SET ';
  foreach ($fields as $key => $value) {
    $sql .= $key . ' = :' . $key . ",";
  }
  $sql = rtrim($sql, ',');
  $sql .= ' WHERE id_libro = :id_libro;';
  echo $sql;
  query($pdo,$sql,$fields);
}
updateBooks($pdo, ['titolo' => 'mysql', 'prezzo' => 50, 'id_libro' => 5]);

 ?>
