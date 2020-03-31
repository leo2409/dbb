<?php
include_once __DIR__ . '/../includes/DatabaseFunction.php';
include_once __DIR__ . '/../includes/DatabaseConnection.php';
$fields = [
  'titolo' => 'pollo',
  'prezzo' => 12,
  'd_pubblicazione' => '1200-09-12',
  'idautore' => 1,
  'editore' => 'apogeo',
];
$sql = 'INSERT INTO ' . 'dbb.libro' . ' SET ';
foreach ($fields as $key => $value) {
  $sql .= ' ' . $key . '= :' . $key . ',';
  echo $key . '<br/>';
}
$sql = rtrim($sql,',') . ';';
echo $sql;
query($pdo,$sql,$fields);
 ?>
