<?php
function query($pdo,$sql,$parameters = []) {
  $stmt = $pdo->prepare($sql);
  $stmt->execute($parameters);
  return $stmt;
}
function totalBook($pdo) {
  $sql = 'SELECT * FROM DBB.libro;';
  $query = query($pdo,$sql);
  $row = $query->fetch();
  return $row;
}
function getBook($pdo,$id) {
  $sql = 'SELECT * FROM dbb.libro WHERE id_libro = :id;';
  $parameters = [':id' => $id ];
  $query = query($pdo,$sql,$parameters);
  return $query->fetch();
}
function insertBook($pdo,$titolo,$prezzo,$data,$autore,$editore) {
  $sql = 'INSERT INTO dbb.libro (titolo,prezzo,d_pubblicazione,idautore,editore) VALUES
  (:titolo,:prezzo,:data,:autore,:editore);';
  $parameters = [
    ':titolo' => $titolo,
    ':prezzo' => $prezzo,
    ':data'   => $data,
    ':autore' => $autore,
    ':editore'=> $editore,
  ];
  query($pdo,$sql,$parameters);
}
function editBook($pdo,$id,$titolo,$prezzo,$data,$autore,$editore) {
  $sql = 'UPDATE dbb.libro SET titolo = :titolo, prezzo = :prezzo,
  d_pubblicazione = :data, idautore = :autore, editore = :editore WHERE id_libro = :id;';
  $parameters = [
    ':titolo' => $titolo,
    ':prezzo' => $prezzo,
    ':data'   => $data,
    ':autore' => $autore,
    ':editore'=> $editore,
    ':id'     => $id,
  ];
  query($pdo,$sql,$parameters);
}
function deleteBook($pdo,$id) {
  $sql = 'DELETE FROM dbb.libro WHERE id_libro = :id;';
  $parameters = [
    ':id' => $id,
  ];
  query($pdo,$sql,$parameters);
}
 ?>
