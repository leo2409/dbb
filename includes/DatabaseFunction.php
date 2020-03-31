<?php
function query($pdo,$sql,$parameters = []) {
  $stmt = $pdo->prepare($sql);
  $stmt->execute($parameters);
  return $stmt;
}

function save($pdo,$record,$table,$primarykey) {
  try {
    if(empty($record[$primarykey])) {
      $primarykey = NULL;
    }
    // INSERT
    $sql = 'INSERT INTO ' . $table . ' SET ';
    foreach ($record as $key => $value) {
    $sql .= ' ' . $key . '= :' . $key . ',';
    }
    $sql = rtrim($sql,',') . ';';
    query($pdo,$sql,$record);
  } catch (PDOException $e) {
    // UPDATE
    $sql = 'UPDATE ' . $table . ' SET ';
    foreach ($record as $key => $value) {
    $sql .= $key . ' = :' . $key . ",";
    }
    $sql = rtrim($sql, ',');
    $sql .= ' WHERE ' . $primarykey . ' = :id_libro;';
    query($pdo,$sql,$record);
  }
}

function insert($pdo,$table,$fields) {
  $sql = 'INSERT INTO ' . $table . ' SET ';
  foreach ($fields as $key => $value) {
    $sql .= ' ' . $key . '= :' . $key . ',';
  }
  $sql = rtrim($sql,',') . ';';
  query($pdo,$sql,$fields);
}

function update($pdo,$table,$primarykey,$fields) {
  $sql = 'UPDATE ' . $table . ' SET ';
  foreach ($fields as $key => $value) {
    $sql .= $key . ' = :' . $key . ",";
  }
  $sql = rtrim($sql, ',');
  $sql .= ' WHERE ' . $primarykey . ' = :id_libro;';
  query($pdo,$sql,$fields);
}

function findAll($pdo,$table) {
  $result = query($pdo,'SELECT * FROM ' . $table . ';');
  return $result->fetchAll();
}

function findById($pdo,$id,$table,$primarykey) {
  $sql = 'SELECT * FROM ' . $table . ' WHERE ' . $primarykey . ' = :id;';
  $parameters = [':id' => $id ];
  $query = query($pdo,$sql,$parameters);
  return $query->fetch();
}

function remove($pdo,$table,$primarykey,$id) {
  $sql = 'DELETE FROM ' . $table . ' WHERE ' . $primarykey . ' = :id;';
  $parameters = [
    'id'   => $id,
  ];
  query($pdo,$sql,$parameters);
}
?>